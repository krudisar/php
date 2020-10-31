<?php

$restHostUrl = "http://x.x.x.x:8888";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $restHostUrl . "/api.php");
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$response = curl_exec ($curl);
$jsonResponse = json_decode($response);

//
foreach ($jsonResponse as $item) {
    echo "Movie: " . $item->name." - " . "Category: " . $item->category;
    echo "<p>";
}
//

curl_close ($curl);

echo "<hr>";
echo "Served by ... :", getHostByName(getHostName());
echo "<hr>";

?>
