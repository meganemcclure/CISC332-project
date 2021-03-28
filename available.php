<!-- 
    Part 2:
    
    Allow the user to enter an airline code and a day, then display all
    the flights associated with the given airline that offer flights on the
    specified day.

    Include the flight code, departing airport location (city) and the arriving
    airport location (city) for these flights
-->

<?php
    include 'components/head.php';
?>

<body>
    <?php
    include 'connectdb.php';
    include 'components/navigation.php'
    ?>

    <h2>Check Available Flights:</h2>
    <form action="available.php" method="post">
        <span>
        <p>Select an Airline: </p>
        <label for="airlineCode">Airline Code:</label>
        <select name="airlineCode">

        <!-- 
            input for airline code -- dynamically generates list of airline codes
            based on the airline codes available in the database

            eliminates the possibility of selecting an invalid code and presenting
            the user with an error -->
        <?php
        $airlineCodes = $connection->query("select * from airline");
        $days = $connection->query("select distinct Day from daysoffered");

        while ($row = $airlineCodes->fetch()) {
            echo '<option value="'.$row["Code"].'">'.$row["Code"].' ('.$row["Name"].')</option>';
        }
        ?>
        </select>
        </span>

        <span>
        <p>Select an available day: </p>

        <!--
            input for the day of the week -- dynamically generates list of days
            based on days of the week that flights are actually offered

            eliminates the possibility of selecting an invalid day and presenting
            the user with an error -->
        <label for="day">Day:</label>
        <select name="day">
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>
        </select>

        </span>
        <input class="button" type="submit" value="Get Flights">
    </form>

    <?php
    if (isset($_POST["airlineCode"]) && isset($_POST["day"])) {
        $airlineCode = $_POST["airlineCode"];
        $day = $_POST["day"];

        $flightsQuery = 'SELECT *
                            FROM daysoffered
                            WHERE AirlineCode="'.$airlineCode.'" AND Day="'.$day.'"';
        
        $flights = $connection->query($flightsQuery);

        if ($flights) {
            echo '<p>Flights:</p>';
            
            echo '<ol>';
            $rowCount = 0;
            while ($row = $flights->fetch()) {
                echo "<li>";
                echo $row["FlightNumber"];
                echo "</li>";
                $rowCount += 1;
            }
            echo '</ol>';

            if (! $rowCount > 0) {
                echo '<p>No available '.$airlineCode.' flights on '.$day.'.</p>';
            }
        } 
    }
    $connection = NULL;
    ?>

</body>

</html>