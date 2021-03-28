<!-- 
    Part 3:
    
    Allow a user to add a new flight

    1. Enter flight number
    2. display available airlines & let them choose one
    3. display avalable planes (that the selected airline owns) and
        let them choose one
    4. display available airports & let them shoose one for departure
    5. allow them to pick the days of the week the flight is offered
    6. allow them to set arrival & departure times for the flight (scheduled)
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

    <p>Add another flight or return to the homepage:</p>

    <form action="airline.php" method="post">
        <input class="button" type="submit" value="Home">
    </form>

    <form action="addFlight.php" method="post">
        <input class="button" type="submit" value="Add Another Flight">
    </form>

    <?php
    $flightNumber = $_POST["flightNumber"];
    $airlineCode = "'".$_POST["airlineCode"]."'";
    $airplane = $_POST["airplane"];
    $departure = "'".$_POST["departureCode"]."'";
    $arrival = "'".$_POST["arrivalCode"]."'";

    $departureTime = "'".$_POST["departureHour"].":".$_POST["departureMinute"].":00'";
    $arrivalTime = "'".$_POST["arrivalHour"].":".$_POST["arrivalMinute"].":00'";

    $insertFlight = "INSERT INTO flight values(".$flightNumber.", ".$airlineCode.", ".$airplane.", ".$departure.", ".$departureTime.", null, ".$arrival.", ".$arrivalTime.", null)";

    $connection->exec($insertFlight);

    if (isset($_POST['dayOffered'])) {
        // add all of them to the daysOffered table
        foreach($_POST['dayOffered'] AS $key=>$day) {
            $connection->exec("INSERT INTO daysoffered values(".$flightNumber.", ".$airlineCode.", '".$day."')");
        }
    }

    include 'components/flightInfo.php'
    ?>

</body>

</html>