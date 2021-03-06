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
<div id="content">
    <?php
    include 'connectdb.php';
    include 'components/navigation.php'
    ?>

    <h2>Check Available Flights</h2>
    <div class="main-content available-content"> 
        <form action="available.php" method="post">
            <h3>Select an Airline</h3>

            <div class="form-group">
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
            </div>

            <h3>Select an available day</h3>
            <div class="form-group">
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
            </div>

            <div class="form-group">
                <input class="button" type="submit" value="Get Flights">
            </div>
        </form>


        <div class="output-content">
            <?php
                if (isset($_POST["airlineCode"]) && isset($_POST["day"])) {
                    $airlineCode = $_POST["airlineCode"];
                    $day = $_POST["day"];

                    $flightsQuery = 'SELECT daysoffered.AirlineCode, daysoffered.FlightNumber, DepartureHost, ArrivalHost
                                        FROM daysoffered, flight
                                        WHERE   daysoffered.AirlineCode="'.$airlineCode.'" AND 
                                                Day="'.$day.'" AND 
                                                daysoffered.AirlineCode=flight.AirlineCode AND 
                                                daysoffered.FlightNumber=flight.Number';
                    
                    $flights = $connection->query($flightsQuery);

                    ?>

                    <table id="ontime">
                        <tr>
                            <th>Flight Code</th>
                            <th>Departure Location</th>
                            <th>Arrival Location</th>
                        </tr>

                    <?php

                    $rowCount = 0;
                    while ($row = $flights->fetch()) {
                        $arrivalLocation = $connection->query('SELECT  DISTINCT Name FROM airport WHERE "'.$row["ArrivalHost"].'"=Code');
                        $departureLocation = $connection->query('SELECT DISTINCT Name FROM airport WHERE "'.$row["DepartureHost"].'"=Code');
                        ?>
                        <tr>

                        <td><?php echo $row["FlightNumber"].$row["AirlineCode"]; ?> </td>
                        <td><?php echo $arrivalLocation->fetch()["Name"]; ?></td>
                        <td><?php echo $departureLocation->fetch()["Name"]; ?></td>

                        </tr>
                        <?php
                        $rowCount += 1;
                    }

                    echo '</table>';

                    if (! $rowCount > 0) {
                        echo '<p>No available '.$airlineCode.' flights on '.$day.'.</p>';
                    }
                }
            ?>
        </div>
    </div>
</div>

</body>
<?php
include 'components/footer.php';
?>

</html>