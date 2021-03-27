<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/airline.css">
</head>

<body>
    <div class="navigation">

        <span class="nav-button-container">
            <form action="airline.php" method="post">
                <input id="test" class="nav-button" type="submit" value="Home">
            </form>
        </span>

        <span class="nav-button-container">
            <form action="onTime.php" method="post">
                <input class="nav-button" type="submit" value="Check On-Time Flights">
            </form>
        </span>

        <span class="nav-button-container">
            <form action="available.php" method="post">
                <input class="nav-button" type="submit" value="Check Available Flights">
            </form>
        </span>

        <span class="nav-button-container">
            <form action="addFlight.php" method="post">
                <input class="nav-button" type="submit" value="Add a Flight">
            </form>
        </span>

        <span class="nav-button-container">
            <form action="updateTimes.php" method="post">
                <input class="nav-button" type="submit" value="Update Departure Time">
            </form>
        </span>

    </div>

</body>

</html>