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
    <script src="JS/carosel.js" defer></script>
</head>

<body>
    <?php
    include 'connectdb.php';
    include 'components/navigation.php'
    ?>

    <form action="airline.php" method="post">
        <input class="button" type="submit" value="Home">
    </form>

    <h1>Create a new flight:</h1>
    <form action="addFlight_results.php" method="post">

    <div class="carosel">
        <div class="slide">
            <h2>Enter a flight number:</h2>
            <input type="text" name="flightNumber"><br>
        </div>

        <div class="slide">
            <h2>Select an airline:</h2>
            <?php
            $airlines = $connection->query("select * from airline");

            while ($row = $airlines->fetch()) {
                echo '<input type="radio" name="airlineCode" value="'.$row["Code"].'">';
                echo $row["Code"]." (".$row["Name"].")";
                echo "<br>";
            }
            ?>
        </div>

        <div class="slide">
            <h2>Select a plane:</h2>
            <?php
            $airlines = $connection->query("select * from airplane");

            while ($row = $airlines->fetch()) {
                echo '<input type="radio" name="airplane" value="'.$row["ID"].'">';
                echo $row["ID"]." (".$row["Design"].")";
                echo "<br>";
            }
            ?>
        </div>

        <div class="slide">
            <h2>Select Departure Location:</h2>
            <?php
            $airports = $connection->query("select * from airport");

            while ($row = $airports->fetch()) {
                echo '<input type="radio" name="departureCode" value="'.$row["Code"].'">';
                echo $row["Code"]." (".$row["Name"].")";
                echo "<br>";
            }
            ?>

            <h2>Select Departure Time:</h2>

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
        </div>

        <div class="slide">
            <h2>Select Arrival Location:</h2>
            <?php
            $airports = $connection->query("select * from airport");

            while ($row = $airports->fetch()) {
                echo '<input type="radio" name="arrivalCode" value="'.$row["Code"].'">';
                echo $row["Code"]." (".$row["Name"].")";
                echo "<br>";
            }
            ?>

            <h2>Select Arrival Time:</h2>

            <label for="arrivalHour">Hour:</label>
            <select name="arrivalHour">
            <?php
            for ($i = 0; $i < 24; $i++) {
                echo "<option value='".$i."'>".$i."</option>";
            }
            ?>
            </select>

            <label for="arrivalMinute">Minute:</label>
            <select name="arrivalMinute">
            <?php
            for ($i = 0; $i < 60; $i++) {
                echo "<option value='".$i."'>".$i."</option>";
            }
            ?>
            </select>
        </div>

        <div class="slide">
            <h2>Select days offered:</h2>
            <input type="checkbox" name="dayOffered[]" value="Monday">Monday<br>
            <input type="checkbox" name="dayOffered[]" value="Tuesday">Tuesday<br>
            <input type="checkbox" name="dayOffered[]" value="Wednesday">Wednesday<br>
            <input type="checkbox" name="dayOffered[]" value="Thursday">Thursday<br>
            <input type="checkbox" name="dayOffered[]" value="Friday">Friday<br>
            <input type="checkbox" name="dayOffered[]" value="Saturday">Saturday<br>
            <input type="checkbox" name="dayOffered[]" value="Sunday">Sunday<br>
        </div>

        <!-- previous, next, and submit buttons -->
        <div class="buttonContainer">
            <button type="button" onclick="plusSlides(-1)">Previous</button>
            <button type="button" onclick="plusSlides(1)">Next</button>
            <input class="button" id="addFlight" type="submit" value="Add Flight">
        </div>
    </div>

    </form>
</body>

</html>