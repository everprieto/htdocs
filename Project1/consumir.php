<?php
//next example will insert new conversation
$service_url = 'http://localhost:8080/Project1/mobile/create/';
$curl = curl_init($service_url);
$curl_post_data = array(
        'name' => 'test sadfjklhgfhjklhgjk',
        'model' => 'agent@example.com',
        'color' => 'departmentId001'

);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
$curl_response = curl_exec($curl);
if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additioanl info: ' . var_export($info));
}
curl_close($curl);
$decoded = json_decode($curl_response);
if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
    die('error occured: ' . $decoded->response->errormessage);
}
echo 'response ok!';

 echo json_decode($curl_response);

var_export($decoded->response);

//echo print_r($decoded);

?>

