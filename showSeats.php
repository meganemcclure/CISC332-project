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
    include 'components/navigation.php';

    $day = $_POST["day"];

    if ($day) {
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

    <h2>Find Average number of Available Seats:</h2>

    <?php
        if (! $day) {
            echo "<p>Please Select a Day of the Week";
        }
    ?>

    <form action="showSeats.php" method="Post">
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

        <input id="average" type="submit" value="Average Seat #">
    </form>

    <?php
        if ($day) {
            $average = 0;
            $rowCount = 0;

            echo '    <table id="components/flightInfo">
                        <tr>
                            <th>Flight Code</th>
                            <th>Plane ID</th>
                            <th>Seat Max</th>
                        </tr>';
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
        if ($day) {
            $average = strval($average/$rowCount);
            echo '<p>Average Seats on '.$day.': '.$average;
        }
    ?>

</body>

</html>