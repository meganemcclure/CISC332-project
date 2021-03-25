<!-- 
    Allow the user to enter an airline code and a day, then display all
    the flights associated with the given airline that offer flights on the
    specified day.

    Include the flight code, departing airport location (city) and the arriving
    airport location (city) for these flights
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

    <form action="airline.php" method="post">
        <input class="button" type="submit" value="Home">
    </form>

    <?php
    $airlineCode = $_POST["airlineCode"];
    $day = $_POST["day"];

    $query = "select * from daysoffered where AirlineCode='".$airlineCode."' and Day='".$day."'";

    $flights = $connection->query($query);

    echo "<ol>";
    while ($row = $flights->fetch()) {
        echo "<li>";
        echo $row["FlightNumber"];
        echo "</li>";
    }
    echo "</ol>";
    ?>
</body>

</html>