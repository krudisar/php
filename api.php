<?php

// Connecting, selecting database
$dbuser_name = "dbuser";
$dbuser_password = "VMware1!";
$db_name = "movies";

$dbconn = pg_connect("host=x.x.x.x dbname=$db_name user=$dbuser_name password=$dbuser_password")
    or die('Could not connect: ' . pg_last_error());

// Performing SQL query
$query = 'SELECT * FROM superheroes';

$result = pg_query($query) or die('Query failed: ' . pg_last_error());

$response = array();

if($result) {
  header("Content-Type: application/json");
  $i = 0;
  while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    $response[$i]['id'] = $line["id"];
    $response[$i]['name'] = $line["name"];
    $response[$i]['category'] = $line["category"];
    $i++;
  }
  // output prepared JSON structure as a response to this API call
  echo json_encode($response, JSON_PRETTY_PRINT);
}

// Final clean up
pg_free_result($result);
pg_close($dbconn);

?>

