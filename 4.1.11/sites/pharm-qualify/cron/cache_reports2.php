#!/usr/bin/php

<?php

$report_dir = "/var/www/reports/AHPC";
$reports = array( 'person_last_reg' );


$suffix = date('Y-m-d');


foreach( $reports as $report ) {
    $filename = "${report_dir}/${report}_${suffix}.html";
    $linkname = "${report_dir}/${report}.html";
    $file = fopen( $filename, "w" );
    $output = shell_exec( "/usr/bin/php ../pages/index.php --page=/CustomReports/show/$report/Export --post=export_style=XML 2> /dev/null" );
    $doc = new DOMDocument();
    $doc->loadXML( $output );

    $qry = new DOMXPath( $doc );

    $name = $qry->query( "//reportDetails/name" )->item(0)->nodeValue;
    $desc = $qry->query( "//reportDetails/description" )->item(0)->nodeValue;
    $when = $qry->query( "//reportDetails/whenGenerated" )->item(0)->nodeValue;


    $dateObj = new DateTime( $when );
    $date_str = $dateObj->format( 'l, F d, Y' );

    fwrite( $file, <<<START
<html>
  <head>
    <style type="text/css">
h1 {
  color: #C30;
  font: 1.6em/1em "Trebuchet MS", Arial, Helvetica, sans-serif;
}
h2 {
  font: 1.1em Verdana, Arial, Helvetica, sans-serif;
}
table {
  width: 95%;
  border-right: 1px solid #BFBFBF;
  border-bottom: 1px solid #BFBFBF;
  border-collapse: separate;
  border-spacing: 0px;
}
table td, table th {
  padding: 2px;
  margin: 2px;
  border-top: 1px solid #BFBFBF;
  border-left: 1px solid #BFBFBF;
  vertical-align: top;
  font: 10px Verdana, Arial, Helvetica, sans-serif;
  color: #333;
}
table th {
  text-align: center;
  font-weight: bold;
}
    </style>
    <title>$name</title>
  </head>
  <body bgcolor="white">
    <h1>$name</h1>
    <h2>$desc</h2>
    <h3>Report generated on: $date_str</h3>
    <p><a href="/reports">Return</a></p>

    <table>
      <tr>

START
);
  
    
    $elements = $qry->query( "//reportDetails/dataElements/elemDesc" );
    $headers = array();
    foreach( $elements as $element ) {
        $header = $qry->query( "name", $element )->item(0)->nodeValue;
        $headers[ $element->getAttribute('id') ] = $header;
        fwrite( $file, "        <th>$header</th>\n" );
    }
    fwrite( $file, "      </tr>\n" );

    $rows = $qry->query( "//reportData/dataRow" );
    foreach( $rows as $row ) {
        fwrite( $file, "      <tr>\n" );
        foreach( $headers as $name => $value ) {
            $text = $qry->query( "dataElement[@name='$name']", $row )->item(0)->nodeValue;
            if ( !$text || $text == "" ) {
                $text = "&nbsp;";
            }
            fwrite( $file, "        <td>$text</td>\n" );
        }
        fwrite( $file, "      </tr>\n" );
    }


    fwrite( $file, <<<FINISH
    </table>
    <p><a href="/reports">Return</a></p>
  </body>
</html>
FINISH
);

    
    unlink( $linkname );
    symlink( $filename, $linkname );

}

?>
