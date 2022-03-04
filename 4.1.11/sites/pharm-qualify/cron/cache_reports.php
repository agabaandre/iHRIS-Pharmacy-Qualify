#!/usr/bin/php

<?php

$reports = array( 
        'registration' => "Registered Health Workers", 
        'lisc_health_workers' => "Licensed Health Workers",
        );


$suffix = date('Y-m-d');
$report_dir = "/var/www/reports/ahpc";


foreach( $reports as $report => $title ) {
    $filename = "${report_dir}/${report}_${suffix}.html";
    $linkname = "${report_dir}/${report}.html";
    $output = shell_exec( "/usr/bin/php ../pages/index.php --page=/CustomReports/show/$report/Export --post=export_style=XML 2> /dev/null" );
    $doc = new DOMDocument();
    $doc->loadXML( $output );

    $qry = new DOMXPath( $doc );

    $name = $qry->query( "//reportDetails/name" )->item(0)->nodeValue;
    $desc = $qry->query( "//reportDetails/description" )->item(0)->nodeValue;
    $when = $qry->query( "//reportDetails/whenGenerated" )->item(0)->nodeValue;


    $dateObj = new DateTime( $when );
    $date_str = $dateObj->format( 'l, F d, Y' );

    $output_str = <<<START
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?xml version="1.0" encoding="utf-8"?>
<html>
  <head>
    <title>iHRIS: AHPC Reports</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="content-language" content="en-us">
    <meta name="robots" content="all">
    <meta name="process_time">
    <meta http-equiv="imagetoolbar" content="false">
    <meta name="MSSmartTagsPreventParsing" content="true">
    <meta name="author" content="Development by IntraHealth International, Inc.  http://www.intrahealth.org/  Website graphic design by DesignHammer Media Group LLC, Building Smarter Websites http://www.designhammer.com">
    <meta name="copyright" content="">
    <meta name="Description" content="">
    <meta name="Keywords" content="">
    <link rel="Shortcut Icon" href="umdpcicon.ico">
    <link rel="stylesheet" href="css/container-print.css" type="text/css" media="print">
    <style type="text/css" media="screen">
      @import url(css/container-screen.css);
    </style>
    <link rel="stylesheet" media="screen" href="css/customReports_display.css" type="text/css">
    <link rel="stylesheet" media="screen" href="css/customReports_display_Default.css" type="text/css">
    <script type="text/javascript">
	//define the table search object, which can implement both functions and properties
        window.tableSearch = {};

        //initialize the search, setup the current object
        tableSearch.init = function() {
            //define the properties I want on the tableSearch object
            this.Rows = document.getElementById('data').getElementsByTagName('TR');
            this.RowsLength = tableSearch.Rows.length;
            this.RowsText = [];
           
            //loop through the table and add the data to the table search object
            for (var i = 0; i < tableSearch.RowsLength; i++) {
                this.RowsText[i] = (tableSearch.Rows[i].innerText) ? tableSearch.Rows[i].innerText.toUpperCase() : tableSearch.Rows[i].textContent.toUpperCase();
            }
        }
		</script>
		<script type="text/javascript">
		//onlys shows the relevant rows as determined by the search string
        tableSearch.runSearch = function() {
            //get the search term
            this.Term = document.getElementById('textBoxSearch').value.toUpperCase();
           
            //loop through the rows and hide rows that do not match the search query
            for (var i = 0, row; row = this.Rows[i], rowText = this.RowsText[i]; i++) {
                row.style.display = ((rowText.indexOf(this.Term) != -1) || this.Term === '') ? '' : 'none';
            }
        }
		
		   //handles the enter key being pressed
        tableSearch.search = function(e) {
            //checks if the user pressed the enter key, and if they did then run the search
            var keycode;
            if (window.event) { keycode = window.event.keyCode; }
            else if (e) { keycode = e.which; }
            else { return false; }
            if (keycode == 13) {
                tableSearch.runSearch();
            }
            else { return false; }
        }
		</script>
	<script type="text/javascript" src="../jquery-1.8.0.js" ></script>
	<script type="text/javascript" src="../table2CSV.js" ></script>
		<script type="text/javascript">
		$(document).ready(function() {

		  $('table').each(function() {
			if ( $(this).hasClass('customReportsTable') )
			  {
				var \$table = $(this);

				var \$button = $("<button type='button'>");
				\$button.text("Export to spreadsheet");
				\$button.insertBefore(\$table);

				\$button.click(function() {
				var csv = \$table.table2CSV({delivery:'value'});
				window.location.href = 'data:text/csv;charset=UTF-8,'
									+ encodeURIComponent(csv);
			});
				return false; 
			  }
			
		  });
		})  </script>
  </head>
  <body onload="tableSearch.init();">

<div id="siteHeadWrap"><!-- ie6 redundant tag fix -->
<div id="siteHeader">

<a name="top"><img src="ahpc_logo.png" alt="" width="63" height="60" id="siteLogo"></a>
<p id="siteName">Allied Health Professionals Council</p>
<p id="siteTag">Reports</p>

<div id="inlineNavWrap"><!-- ie6 redundant tag fix -->
<div id="inlineNavBar">
  <ul>
    <li><a href="/">Home</a></li>
    <li><a href="/reports">Reports</a></li>
</ul><ul id="sysUser">
</ul></div><!-- /inlineNavBar -->
</div><!-- /inlineNavWrap -->

<div id="welcomeIntro"></div>

</div><!-- /siteHeader -->
</div><!-- /siteHeadWrap -->

<div id="siteOuterWrap">

<div id="siteInnerWrap">

<div id="navBar">
<ul id="navBarUL">

START;
    foreach( $reports as $lireport => $lititle ) {
        $output_str .= '    <li><a href="' . $lireport . '.html" ' 
                . ( $lireport == $report ? 'class="active"' : '' ) 
                . '>' . $lititle . '</a></li>' . "\n";
    }
  
    $output_str .= <<<START2
</ul></div>

<div id="siteContent">

    <h1>$name</h1>
    <h2>$desc</h2>
    <h3>Report generated on: $date_str</h3>
    <h3>Total Rows: ROW_COUNT</h3>

    <table border="0" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td>
                    <input type="text" size="30" maxlength="1000" value="" id="textBoxSearch" onkeyup="tableSearch.search(event);" />
                    <input type="button" value="Search" onclick="tableSearch.runSearch();" />
                </td>
            </tr>
        </tbody>
    </table>

    <div id="report_table">
        
    <table class="customReportsTable">
      <tr>
        <th>#</th>

START2;
  
    
    $elements = $qry->query( "//reportDetails/dataElements/elemDesc" );
    $headers = array();
    foreach( $elements as $element ) {
        $header = $qry->query( "name", $element )->item(0)->nodeValue;
        $headers[ $element->getAttribute('id') ] = $header;
        $output_str .= "        <th>$header</th>\n";
    }
    $output_str .= "      </tr>\n<tbody id=\"data\">\n";

    $rows = $qry->query( "//reportData/dataRow" );
    $rowCount = 0;
    foreach( $rows as $row ) {
        $output_str .= "      <tr>\n";
        $rowCount++;
        $output_str .= "        <td>$rowCount</td>\n";
        foreach( $headers as $name => $value ) {
            $text = $qry->query( "dataElement[@name='$name']", $row )->item(0)->nodeValue;
            $output_str .= "        <td>$text</td>\n";
        }
        $output_str .= "      </tr>\n";
    }
    $output_str = str_replace( "ROW_COUNT", $rowCount, $output_str );


    $output_str .= <<<FINISH
	</tbody>
    </table>
    </div>
</div>

  <br style="clear: both;"></div><!-- /siteInnerWrap -->
<div id="StretchPage"></div>
<div id="siteFooter">

</div><!-- /siteFooter -->

</div><!-- /siteOuterWrap -->

</body>
</html>

FINISH;

    $file = fopen( $filename, "w" );
    fwrite( $file, $output_str );
    fclose( $file );
    if ( file_exists( $linkname ) ) {
        unlink( $linkname );
    }
    symlink( $filename, $linkname );
    

}

?>
