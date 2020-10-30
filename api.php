
<?php
// Connecting, selecting database
$dbuser_user = "dbuser";
$dbuser_password = "VMware1!";

$dbconn = pg_connect("host=x.x.x.x dbname=movies user=$dbuser_user password=$dbuser_password")
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
  echo json_encode($response, JSON_PRETTY_PRINT);
}

// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);

//echo "<hr>";
//echo "Served by ... :", getHostByName(getHostName());

?>
