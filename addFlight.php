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

    include 'flightInfo.php'
    ?>

</body>

</html>