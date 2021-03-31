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
<div id="content">
    <?php
    include 'connectdb.php';
    include 'components/navigation.php';

    if (isset($_POST["flightNumber"])) {
        echo '<h2>Create another flight?</h2>';

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
    } else {
        echo '<h2>Create a new flight</h2>';
    }
    ?>

    <div class="main-content"> 
        <form action="addFlight.php" method="post">

        <div class="carosel">
            <div class="slide">
                <h3>Enter a flight number (required) <span id="code-error">* Flight Numbers must be 3 digits</span></h3>
                <div class="form-group">
                    <label for="flightNumber">Flight Number:</label>
                    <input type="text" name="flightNumber" id="flightNumber" required>
                </div>
            </div>

            <div class="slide">
                <h3>Select an airline</h3>

                <div class="form-group">
                    <label for="airlineCode">Airline:</label>
                    <select name="airlineCode" required>

                    <?php
                    $airlineCodes = $connection->query("select * from airline");

                    while ($row = $airlineCodes->fetch()) {
                        echo '<option value="'.$row["Code"].'">'.$row["Code"].' ('.$row["Name"].')</option>';
                    }
                    ?>
                    </select>
                </div>
            </div>

            <div class="slide">
                <h3>Select a plane:</h3>

                <div class="form-group">
                    <label for="airplane">Plane:</label>
                    <select name="airplane">

                    <?php
                    $airplanes = $connection->query("select * from airplane");
                    
                    while ($row = $airplanes->fetch()) {
                        echo '<option value="'.$row["ID"].'">'.$row["ID"].' ('.$row["Design"].')</option>';
                    }
                    ?>
                    </select>
                </div>
            </div>

            <div class="slide">
                <h3>Select Departure Location</h3>
                <div class="form-group">
                    <label for="departureCode">Airport:</label>
                    <select name="departureCode">
                        <?php
                        $airports = $connection->query("select * from airport");

                        while ($row = $airports->fetch()) {
                            echo '<option value="'.$row["Code"].'">'.$row["Code"].' ('.$row["Name"].')</option>';
                        }
                        ?>
                    </select>
                </div>

                <h3>Select Departure Time</h3>
                <div class="form-group">
                    <label for="departureHour">Hour:</label>
                    <select name="departureHour">
                        <?php
                        for ($i = 0; $i < 24; $i++) {
                            echo "<option value='".$i."'>".$i."</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">   
                    <label for="departureMinute">Minute:</label>
                    <select name="departureMinute">
                        <?php
                        for ($i = 0; $i < 60; $i++) {
                            echo "<option value='".$i."'>".$i."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="slide form-group">
                <h3>Select Arrival Location:</h3>
                <div class="form-group">
                    <label for="arrivalCode">Airport:</label>
                    <select name="arrivalCode">

                        <?php
                        $airports = $connection->query("select * from airport");

                        while ($row = $airports->fetch()) {
                            echo '<option value="'.$row["Code"].'">'.$row["Code"].' ('.$row["Name"].')</option>';
                        }
                        ?>
                    </select>
                </div>

                <h3>Select Arrival Time:</h3>
                <div class="form-group">
                    <label for="arrivalHour">Hour:</label>
                    <select name="arrivalHour">
                        <?php
                        for ($i = 0; $i < 24; $i++) {
                            echo "<option value='".$i."'>".$i."</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="arrivalMinute">Minute:</label>
                    <select name="arrivalMinute">
                        <?php
                        for ($i = 0; $i < 60; $i++) {
                            echo "<option value='".$i."'>".$i."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="slide">
                <div class="form-group">
                    <label for="dayOffered[]">Select days offered:</label>
                    <input type="checkbox" name="dayOffered[]" value="Monday">Monday<br>
                    <input type="checkbox" name="dayOffered[]" value="Tuesday">Tuesday<br>
                    <input type="checkbox" name="dayOffered[]" value="Wednesday">Wednesday<br>
                    <input type="checkbox" name="dayOffered[]" value="Thursday">Thursday<br>
                    <input type="checkbox" name="dayOffered[]" value="Friday">Friday<br>
                    <input type="checkbox" name="dayOffered[]" value="Saturday">Saturday<br>
                    <input type="checkbox" name="dayOffered[]" value="Sunday">Sunday<br>
                </div>
            </div>

            <!-- previous, next, and submit buttons -->
            <div>
                <div class="buttonContainer">
                    <div class="carosel-button" id="previousButton"><button type="button" onclick="plusSlides(-1)">Previous</button></div>
                    <div class="carosel-button" id="nextButton"><button type="button" onclick="plusSlides(1)">Next</button></div>
                </div>
            </div>

            <input class="button" id="addFlight" type="submit" value="Add Flight">
        </div>

        </form>

    </div>

    <div class="output-content">
        <?php
            if (isset($_POST["flightNumber"])) {
                echo '<p>Check that your flight was added to the available flights</p>';
                include 'components/flightInfo.php';
            }
        ?>
    </div>
</div>

</body>
<?php
include 'components/footer.php';
?>

</html>