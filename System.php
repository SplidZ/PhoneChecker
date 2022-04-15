<?php

$api = 'Clée api';

$phone_number = readline("Entrez un numéro de téléphone : ");
print "Collecte d'informations en cours...."."\n";
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
 echo "Opérateur :". ' '.$validationResult['carrier']."\n";
 echo "Code de pays :". ' ' .$validationResult['country_code']."\n";
 echo "Localisation :". ' ' .$validationResult['location']."\n";
 echo "Nom du pays :". ' ' .$validationResult['country_name']."\n";
 echo "Type de ligne :". ' ' .$validationResult['line_type']."\n";
}

?>
