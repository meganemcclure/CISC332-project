<!-- 
    /llow the user to update the actual departure tiem of a flight.

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

    <h2>Update Departure time</h2>

    <form action="updateFlight.php" method="post">
        <label for="flight">Select Flight:</label>
        <select name="flight">
        <?php
        $flights = $flights = $connection->query("select * from flight");

        while ($row = $flights->fetch()) {
            echo "<option value='".$row["Number"].$row["AirlineCode"]."'>".$row["Number"].$row["AirlineCode"]."</option>";
        }
        ?>
        </select>

        <label for="departureHour">Hour:</label>
        <select name="departureHour">
        <?php
        for ($i = 0; $i < 24; $i++) {
            echo "<option value='".$i."'>".$i."</option>";
        }
        ?>
        </select>

        <label for="departureMinute">Minute:</label>
        <select name="departureMinute">
        <?php
        for ($i = 0; $i < 60; $i++) {
            echo "<option value='".$i."'>".$i."</option>";
        }
        ?>
        </select>

        <input class="button" id="updateFlight" type="submit" value="Update Flight">
    </form>

</body>

</html>