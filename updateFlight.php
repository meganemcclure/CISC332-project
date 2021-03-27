<!-- 
    Allow the user to update the actual departure tiem of a flight.

    The user should choose from a list of flight codes, enter a new
    time & the information in the table should be updated.
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

    <h2>Departure Time Updated</h2>

    <p>Update another flight or return to the homepage:</p>

    <form action="airline.php" method="post">
        <input class="button" type="submit" value="Home">
    </form>

    <form action="selectUpdate.php" method="post">
        <input class="button" type="submit" value="Update Another Flight">
    </form>

    <?php
    $flightNumber = substr($_POST["flight"], 0, 3);
    $airlineCode = "'".substr($_POST["flight"], 3)."'";

    $departureTime = "'".$_POST["departureHour"].":".$_POST["departureMinute"].":00'";

    $updateDeparture = "UPDATE flight SET ADepartTime=".$departureTime."WHERE Number=".$flightNumber." and AirlineCode=".$airlineCode;
    $connection->exec($updateDeparture);
    
    include 'flightInfo.php';
    ?>

</body>

</html>