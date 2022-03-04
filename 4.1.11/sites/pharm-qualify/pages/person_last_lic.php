<?php
header('content-type: application/json');
header('Access-Control-Allow-Origin: *');
//get last registration report 
ini_set('display_startup_errors', 1);
$db = new mysqli("localhost","qualify","C3nC3r96","pharmacy_society");
// Check connection
if ($db -> connect_errno) {
   echo "Failed to connect : " . $db -> connect_error;
exit();
}
   $query = $db->query("SELECT `person+surname` AS Surname, `person+firstname` AS Firstname, `primary_form+license_number` AS License_Number, `primary_form+start_date` AS License_Start_Date, `primary_form+end_date` AS License_End_Date
   FROM zebra_license");
    $arr = [];
   while($row=$query->fetch_assoc()) {
      
      $arr[] = $row; 
     
   }
   echo json_encode($arr, JSON_PRETTY_PRINT);
   
  

?>
