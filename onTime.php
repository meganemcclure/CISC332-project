<!-- 
    Show all the flights (flight number (airline code & 3 digit number) and arrival time) with scheduled arival
    times that are the same as their actual arrival times.
-->

<?php
$flights = $connection->query("select * from flight where SArriveTime=AArriveTime");

echo "<ol>";
while ($row = $flights->fetch()) {
    echo "<li>";
    echo "Flight Code: ".$row["Number"].$row["AirlineCode"];
    echo "<p>Arrival Time: ".$row["AArriveTime"]."</p>";
    echo "</li>";
}
echo "</ol>";
?>