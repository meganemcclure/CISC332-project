<!--
    Displays a list of all the flight information for all available flights

    Usage: 
        include 'flightInfo.php'
-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/airline.css">
</head>

<label for="flightInfo">Current Flight Information</label>
<table id="FlightInfo">
    <tr>
        <th>Flight Code</th>
        <th>Departure Location</th>
        <th>Arrival Location</th>
        <th>Scheduled Departure Time</th>
        <th>Actual Departure Time</th>
        <th>Scheduled Arrival Time</th>
        <th>Actual Arrival Time</th>
    </tr>

    <?php
    $flights = $flights = $connection->query("select * from flight");

    while ($row = $flights->fetch()) {
    echo "<tr>";

    echo "<td>".$row["Number"].$row["AirlineCode"]."</td>";
    echo "<td>".$row["DepartureHost"]."</td>";
    echo "<td>".$row["ArrivalHost"]."</td>";
    echo "<td>".$row["SDepartTime"]."</td>";
    echo "<td>".$row["ADepartTime"]."</td>";
    echo "<td>".$row["SArriveTime"]."</td>";
    echo "<td>".$row["AArriveTime"]."</td>";

    echo "</tr>";
    }
    ?>

</table>