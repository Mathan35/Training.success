<?php

$array = [
   
    'name'     =>  'Mathankumar',

    'email'    =>  'bmathan777@gmail.com',
   
    'address_1' =>array(
    
        'Door no'     => '123',
        'Street Name' => 'Anna st',
        'Area'        => 'Puthur',
        'City'        => 'Vellakovil'
        
    ),

    'address_2' =>array(
    
        'Door no'     => '321',
        'Street Name' => 'Raman st',
        'Area'        => 'Karur',
        'City'        => 'Mangalam'
    ),

    'Phone Number' =>array(
    
        'One'     => '9878787878',
        'Two' => '8756879987',
    )
];

echo "Your Name : ".$array['name']."\n";
echo "Your Email : ".$array['email']."\n  \n";

echo "Your address 1 :"."\n";
echo "Your Door no : ".$array['address_1']['Door no']."\n";
echo "Your Street Name : ".$array['address_1']['Street Name']."\n";
echo "Your Area : ".$array['address_1']['Area']."\n";
echo "Your City : ".$array['address_1']['City']."\n  \n";

echo "Your address 2 :"."\n";
echo "Your Door no : ".$array['address_2']['Door no']."\n";
echo "Your Street Name : ".$array['address_2']['Street Name']."\n";
echo "Your Area : ".$array['address_2']['Area']."\n";
echo "Your City : ".$array['address_2']['City']."\n  \n";

echo "Your Phone Number :"."\n";
echo "One: ".$array['Phone Number']['One']."\n";
echo "Two: ".$array['Phone Number']['Two']."\n";
?>