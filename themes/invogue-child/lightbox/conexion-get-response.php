
<?php
/**$curl = curl_init("https://api.getresponse.com/v3/contacts");


var_dump($data_string);

curl_setopt($curl, CURLOPT_HTTPHEADER, array("ContentType: application/json","X-Auth-Token: api-key 824dbed954950f7122472b5e09c81fd6"));
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);                                                               
//curl_setopt($curl, CURLOPT_URL, "https://api.getresponse.com/v3/contacts");
//$curl

 $result = curl_exec($curl);**/
$ch = curl_init();
$data = array("name" => "Hagrid", "email" => "fab@cliento.mx",  "campaign" => array("campaignId" => "45661801"));                                                                    
$data_string = json_encode($data); 
// Set some options - we are passing in a useragent too here
curl_setopt($ch, CURLOPT_URL, "https://api.getresponse.com/v3/contacts");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',"X-Auth-Token: api-key c32682624fdd4ef62fa61fd7b245cfd4"));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response  = curl_exec($ch);
var_dump($response);
curl_close($ch);
?>