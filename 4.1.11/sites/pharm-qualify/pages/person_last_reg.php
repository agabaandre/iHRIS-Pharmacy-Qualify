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
$query = $db->query("SELECT `primary_form+surname` AS Surname, `primary_form+firstname` AS Firstname, `last_registration+registration_number` AS Registration_Number, `last_registration+registration_date` AS Registartion_Date, `hippo_training_institution`.name AS Training_Institution
FROM zebra_person_last_reg
LEFT JOIN `hippo_training_institution` ON hippo_training_institution.id = zebra_person_last_reg.`last_training+training_institution`");
    $arr = [];
   while($row=$query->fetch_assoc()) {
      
      $arr[] = $row; 
     
   }
   echo json_encode($arr, JSON_PRETTY_PRINT);
   
  

?>
