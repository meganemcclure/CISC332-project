<?php
    include 'components/head.php';
    include 'components/header.php';
?>

<body>
    <?php
    include 'connectdb.php';
    ?>

    <div class="home-page">

        <span>
            <form action="airline.php" method="post">
                <input id="test" class="nav-button" type="submit" value="Home">
            </form>
        </span>

        <span>
            <form action="onTime.php" method="post">
                <input class="nav-button" type="submit" value="Check On-Time Flights">
            </form>
        </span>

        <span>
            <form action="available.php" method="post">
                <input class="nav-button" type="submit" value="Check Available Flights">
            </form>
        </span>

        <span>
            <form action="addFlight.php" method="post">
                <input class="nav-button" type="submit" value="Add a Flight">
            </form>
        </span>

        <span>
            <form action="updateTimes.php" method="post">
                <input class="nav-button" type="submit" value="Update Departure Time">
            </form>
        </span>

        <span>
            <form action="showSeats.php" method="post">
                <input class="nav-button" type="submit" value="Show Average Number of Seats">
            </form>
        </span>

    </div>

    <?php
    include 'components/footer.php';
    $connection = NULL;
    ?>

</body>

</html>