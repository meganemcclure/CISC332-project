<!-- 
    Part 4:
    
    Allow the user to update the actual departure tiem of a flight.

    The user should choose from a list of flight codes, enter a new
    time & the information in the table should be updated.
-->

<?php
    include 'components/head.php';
?>

<body>
<div id="content">
    <?php
        include 'connectdb.php';
        include 'components/navigation.php';

        if (isset($_POST["flight"])) {
            echo '<h2>Update another departure time?</h2>';
        } else {
            echo '<h2>Update departure time</h2>';
        }
    ?>

    <div class="main-content"> 
        <form action="updateTimes.php" method="post">
            <div class="form-group">
                <label for="flight">Select Flight:</label>
                <select name="flight">
                <?php
                    $flights = $flights = $connection->query("select * from flight");

                    while ($row = $flights->fetch()) {
                        echo "<option value='".$row["Number"].$row["AirlineCode"]."'>".$row["Number"].$row["AirlineCode"]."</option>";
                    }
                ?>
                </select>
            </div>

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

            <div class="form-group">
                <input class="button" id="updateTimes_results" type="submit" value="Update Flight Times">
            </div>
        </form>
    </div>

    <div class="output-content">
    <?php
        if (isset($_POST["flight"])) {
            $flightNumber = substr($_POST["flight"], 0, 3);
            $airlineCode = "'".substr($_POST["flight"], 3)."'";

            $departureTime = "'".$_POST["departureHour"].":".$_POST["departureMinute"].":00'";

            $updateDeparture = "UPDATE flight SET ADepartTime=".$departureTime."WHERE Number=".$flightNumber." and AirlineCode=".$airlineCode;
            $connection->exec($updateDeparture);

            include 'components/flightInfo.php';
        }
        // include 'components/footer.php';
    ?>
    </div>
</div>

</body>
<?php
include 'components/footer.php';
?>
</html>