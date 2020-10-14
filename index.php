<?php
// Connecting, selecting database
$dbuser_password = "VMware1!";
$dbconn = pg_connect("host=x.x.x.x dbname=movies user=dbuser password=$dbuser_password")
    or die('Could not connect: ' . pg_last_error());

// Performing SQL query
$query = 'SELECT * FROM superheroes';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

// Printing results in HTML
echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t<td><h1>\t$col_value</h1></td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);

echo "<hr>";
echo "Served by ... :", getHostByName(getHostName());

?>
