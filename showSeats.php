<!-- 
    Part 5:
    
    Allow the user to select a day of the week and calcualte and display
    the average number of seats avialble on all flights on that day.

    For instance, if there are 3 flights on a Wenesday:
    1. flight 1: 200 seats
    2. flight 2: 300 seats
    3. flight 3: 400 seats

    average number of seats for Wednesday = 300 seats
-->

<?php
    include 'components/head.php';
?>

<body>
<div id="content">
    <?php
    include 'connectdb.php';
    include 'components/navigation.php';

    if (isset($_POST["day"])) {
        $day = $_POST["day"];
        $formattedDay = '"'.$day.'"';
        $planesQuery = "SELECT flight.Number, flight.AirlineCode, flight.Plane, airplane.ID, planetype.SeatMax
                            FROM daysoffered, flight, airplane, planetype 
                            WHERE daysoffered.Day=".$formattedDay." AND 
                                    daysoffered.FlightNumber=flight.Number AND 
                                    daysoffered.AirlineCode=flight.AirlineCode AND
                                    flight.Plane=airplane.ID AND
                                    airplane.Design=planetype.Name";

        $planes = $connection->query($planesQuery);
    }
    
    ?>

    <h2>Find Average number of Available Seats</h2>

    <div class="main-content">
        <?php
            if (! isset($_POST["day"])) {
                echo "<h3>Please Select a Day of the Week</h3>";
            } else {
                echo "<h3>Select Another Day of the Week?</h3>";
            }
        ?>

        <form action="showSeats.php" method="Post">
            <div class="form-group">
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
                <input class="button" id="average" type="submit" value="Average Seat #">
            </div>
        </form>
    </div>

    <div class="output-content">
        <?php
            if (isset($_POST["day"])) {
                $average = 0;
                $rowCount = 0;

                ?>
                <table id="components/flightInfo">
                    <tr>
                        <th>Flight Code</th>
                        <th>Plane ID</th>
                        <th>Seat Max</th>
                    </tr>
                <?php
                while ($row = $planes->fetch()) {
                    echo "<tr>";

                    echo "<td>".$row["Number"].$row["AirlineCode"]."</td>";
                    echo "<td>".$row["ID"]."</td>";
                    echo "<td>".$row["SeatMax"]."</td>";

                    $average += $row["SeatMax"];
                    $rowCount += 1;

                    echo '</tr>';
                }

                echo '</table>';
            }
        ?>

        <?php
            if (isset($_POST["day"]) and $rowCount > 0) {
                $average = strval($average/$rowCount);
                echo '<p>Average Seats on '.$day.': '.$average;
            } else if (isset($_POST["day"])) {
                echo '<p>No Flights on '.$day.'.';
                echo '<p>Average Seats on '.$day.': 0';
            }
        ?>
    </div>
</div>

</body>
<?php
include 'components/footer.php';
?>

</html>