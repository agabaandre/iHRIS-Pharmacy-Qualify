#!/bin/bash
#Exit on error
set -e
set -x

PPA=release

#Don't edit below

HOME=`pwd`
AWK=/usr/bin/awk
HEAD=/usr/bin/head
SORT=/usr/bin/sort
DCH=/usr/bin/dch
PR=/usr/bin/pr 
SED=/bin/sed
FMT=/usr/bin/fmt
PR=/usr/bin/pr
XARGS=/usr/bin/xargs
BZR=/usr/bin/bzr
GREP=/bin/grep
PHP=/usr/bin/php

cd $HOME/targets
TARGETS=(*)
echo $TARGETS
cd $HOME


#path to site relative to bzr branch directory
SITEDIR=sites/Demo



LASTRELEASE=$(bzr  tags | pcregrep --only-matching '^[1-9]+\.[0-9]+\.[0-9]+-release' | $SED 's/\-release//' |$SORT -rV | $HEAD -1)
LASTVERS=$(bzr  tags | pcregrep --only-matching '^[1-9]+\.[0-9]+\.[0-9]+\.[0-9]+-ubuntu-site-release' | $SED 's/\-ubuntu-site-release//' |$SORT -rV | $HEAD -1)
MINVERS=$LASTRELEASE.0
LASTVERS=$(echo "$LASTVERS
$MINVERS" | $SORT -rV | $HEAD -1)
VERS="${LASTVERS%.*}.$((${LASTVERS##*.}+1))"

PARENT=$($BZR info -vv | $GREP "checkout of branch" | $SED 's/\s*checkout of branch:\s*//')
#I2CE=$(echo $PARENT | $SED -r 's/branch\/[a-zA-Z0-9+\_-]+\//branch\/i2ce\//')
I2CE=$(echo $PARENT | $SED -r 's/informatics\/[a-zA-Z0-9+\_-]+\//informatics\/i2ce\//')

echo Current tagged verison is $LASTVERS.
echo Parent Branch is $PARENT
$BZR status

echo Should we update changelogs, commit under packacing everything and increment to $VERS? [y/n]
INCVERS="y" 

if [[ "$INCVERS" == "y" || "$INCVERS" == "Y" ]];  then
    COMMITMSG="Ubuntu Site Release Version $VERS"
    WIDTH=68

    LOGLINES=$($BZR log --line -r tag:$LASTVERS-ubuntu-site-release.. )

    FULLCOMMITMSG=$(echo "$COMMITMSG 
$LOGLINES" |  $FMT -w $WIDTH -g $WIDTH | $XARGS -0 | $AWK '{printf "%-'"$WIDTH.$WIDTH"'s\n" , $0}')
    echo $FULLCOMMITMSG

    for TARGET in "${TARGETS[@]}"
    do
	cd $HOME/targets/$TARGET
	$DCH -Mv "${VERS}~$TARGET" --distribution "${TARGET}" "${FULLCOMMITMSG}"
    done
    cd $HOME
    $BZR diff && echo $? > /dev/null

    echo "Incrementing version"


    $BZR commit ./ -m "\"${COMMITMSG}\""
    $BZR tag $VERS-ubuntu-site-release
elif  [[ "$INCVERS" == "n" || "$INCVERS" == "N" ]];  then
    echo "Not incremementing version"
else
    echo "Don't know what' to do"
    exit 1
fi



if [ -n "$LAUNCHPADPPALOGIN" ]; then
  echo Using $LAUNCHPADPPALOGIN for Launchpad PPA login
  echo "To Change You can do: export LAUNCHPADPPALOGIN=$LAUNCHPADPPALOGIN"
else 
  echo -n "Enter your launchpad login for the ppa and press [ENTER]: "
  read LAUNCHPADPPALOGIN
  echo "You can do: export LAUNCHPADPPALOGIN=$LAUNCHPADPPALOGIN to avoid this step in the future"
fi


if [ -n "${DEB_SIGN_KEYID}" ]; then
  echo Using ${DEB_SIGN_KEYID} for Launchpad PPA login
  echo "To Change You can do: export DEB_SIGN_KEYID=${DEB_SIGN_KEYID}"
  echo "For unsigned you can do: export DEB_SIGN_KEYID="
  KEY="-k${DEB_SIGN_KEYID}"
else 
  echo "No DEB_SIGN_KEYID key has been set.  Will create an unsigned"
  echo "To set a key for signing do: export DEB_SIGN_KEYID=<KEYID>"
  echo "Use gpg --list-keys to see the available keys"
  KEY="-uc -us"
fi


BUILD=$HOME/builds


for TARGET in "${TARGETS[@]}"
do
    TARGETDIR=$HOME/targets/$TARGET
    echo "$HEAD -1 $TARGETDIR/debian/changelog | $AWK '{print $2}' | $AWK -F~ '{print $1}' | $AWK -F\( '{print $2}'"
    RLS=`$HEAD -1 $TARGETDIR/debian/changelog | $AWK '{print $2}' | $AWK -F~ '{print $1}' | $AWK -F\( '{print $2}'`
    PKG=`$HEAD -1 $TARGETDIR/debian/changelog | $AWK '{print $1}'`
    PKGDIR=${BUILD}/${PKG}-${RLS}~${TARGET}
    SRCDIR=${PKGDIR}/tmp-src
    CHANGES=${BUILD}/${PKG}_${RLS}~${TARGET}_source.changes
    IHRISDIR=$PKGDIR/var/lib/iHRIS

    echo  "echo Building Site Package $PKG  on $RLS for Target $TARGET"

    rm -fr $PKGDIR
    mkdir -p $SRCDIR
    mkdir -p $IHRISDIR
    $BZR checkout --lightweight $PARENT  $SRCDIR/$PKG
    if [ "$PKG" != "i2ce" ]; then
	$BZR checkout --lightweight $I2CE  $SRCDIR/i2ce
    fi


    cd $SRCDIR/$PKG
    $PHP $SRCDIR/i2ce/tools/translate_templates.php

    mkdir -p $IHRISDIR/sites/$PKG
    cp -R $SRCDIR/$PKG/$SITEDIR/* $IHRISDIR/sites/$PKG
    cp  -R $TARGETDIR/* $PKGDIR


    cd $PKGDIR  
    echo `pwd`
    if [[ -n "${DEB_SIGN_KEYID}" && -n "{$LAUNCHPADLOGIN}" ]]; then
	DPKGCMD="dpkg-buildpackage $KEY  -S -sa "
	$DPKGCMD

	DPUTCMD="dput ppa:$LAUNCHPADPPALOGIN/$PPA  $CHANGES"
	$DPUTCMD
        #cd $PKGDIR && dpkg-buildpackage -uc -us
        #cd $PKGDIR && dpkg-buildpackage -k${DEB_SIGN_KEYID} -S -sa 
        #
    else
	echo "Not uploaded to launchpad"
	DPKGCMD="dpkg-buildpackage -uc -us"
        $DPKGCMD
    fi
done


cd $HOME

$BZR push $PARENT
