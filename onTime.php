<!-- 
    Part 1:
    
    Show all the flights (flight number (airline code & 3 digit number) and arrival time) with scheduled arival
    times that are the same as their actual arrival times.
-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Airline</title>
    <link rel="stylesheet" href="CSS/airline.css">
</head>

<body>
    <?php
    include 'connectdb.php';
    include 'components/navigation.php'
    ?>
    <h2>Flights that have arrived On Time</h2>
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

    $connection = NULL;
    ?>

</body>

</html>