<!-- 
    Shown after the user has added a new flight. Allows them to choose to:

    1. return to the homepage
    2. add another flight
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
    ?>

    <p>Add another flight or return to the homepage:</p>

    <form action="airline.php" method="post">
        <input class="button" type="submit" value="Home">
    </form>

    <form action="createFlight.php" method="post">
        <input class="button" type="submit" value="Add Another Flight">
    </form>

    <p>All Flights Offered (make sure your flight has been added)</p>
    <table>
    <tr>
        <th>Flight Code</th>
        <th>Departure Location</th>
        <th>Arrival Location</th>
        <th>Scheduled Departure Time</th>
        <th>Scheduled Arrival Time</th>
    </tr>

    <?php
    $flightNumber = $_POST["flightNumber"];
    $airlineCode = "'".$_POST["airlineCode"]."'";
    $airplane = $_POST["airplane"];
    $departure = "'".$_POST["departureCode"]."'";
    $arrival = "'".$_POST["arrivalCode"]."'";
    // $daysOffered = $_POST("daysOffered");

    $insertFlight = "INSERT INTO flight values(".$flightNumber.", ".$airlineCode.", ".$airplane.", ".$departure.", null, null, ".$arrival.", null, null)";

    $insert = $connection->exec($insertFlight);

    $flights = $connection->query("select * from flight");

    while ($row = $flights->fetch()) {
        echo "<tr>";

        echo "<td>".$row["Number"].$row["AirlineCode"]."</td>";
        echo "<td>".$row["DepartureHost"]."</td>";
        echo "<td>".$row["ArrivalHost"]."</td>";
        echo "<td>".$row["SDepartTime"]."</td>";
        echo "<td>".$row["SArriveTime"]."</td>";

        echo "</tr>";
    }
    ?>

    </table>

</body>

</html>