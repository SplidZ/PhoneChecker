<?php

$api = 'Clée api';

$phone_number = readline("[-] Enter Phone Number [+] : ");
print "collecting information in progress...."."\n";
sleep(5);

$ch = curl_init('http://apilayer.net/api/validate?access_key='.$api.'&number='.$phone_number.'');  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$json = curl_exec($ch);
curl_close($ch);

$validationResult = json_decode($json, true);
$validationResult['country_code'];
$validationResult['carrier'];
$validationResult['location'];
$validationResult['country_name'];
$validationResult['line_type'];

if($phone_number)
{
 echo "Carrier:". ' '.$validationResult['carrier']."\n";
 echo "Country Code:". ' ' .$validationResult['country_code']."\n";
 echo "Location:". ' ' .$validationResult['location']."\n";
 echo "Country Name:". ' ' .$validationResult['country_name']."\n";
 echo "Line Type:". ' ' .$validationResult['line_type']."\n";
}

?>
