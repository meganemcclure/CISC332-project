<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Vet Clinic</title>
    <link rel="stylesheet" href="airline.css">
</head>

<body>
    <?php
    include 'connectdb.php';
    ?>
    <h1>Welcome to the Airline Database Management System</h1>

    <h2>Flights that arrived on time</h2>

    <?php
    include 'onTime.php';
    ?>

    <h2>Check Available Flights</h2>
    <form action="getFlights.php" method="post">
        <?php
        $airlineCodes = $connection->query("select * from airline");
        $days = $connection->query("select distinct Day from daysoffered");

        // input for airline code -- dynamically generates list of airline codes
        // based on the airline codes available in the database

        // eliminates the possibility of selecting an invalid code and presenting
        // the user with an error
        echo "<p>Select an Airline: </p>";
        while ($row = $airlineCodes->fetch()) {
            echo '<input type="radio" name="airlineCode" value="'.$row["Code"].'">';
            echo $row["Code"]." (".$row["Name"].")";
            echo "<br>";
        }

        // input for the day of the week -- dynamically generates list of days
        // based on days of the week that flights are actually offered

        // eliminates the possibility of selecting an invalid day and presenting
        // the user with an error
        echo "<p>Select an available day: </p>";
        while ($row = $days->fetch()) {
            echo '<input type="radio" name="day" value="'.$row["Day"].'">';
            echo $row["Day"];
            echo "<br>";
        }
        ?>
        <input type="submit" value="Get Flights">
    </form>

<?php
$connection = NULL;
?>

</body>

</html>