<!-- 
    Part 1:
    
    Show all the flights (flight number (airline code & 3 digit number) and arrival time) with scheduled arival
    times that are the same as their actual arrival times.
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
    <h2>Flights that have arrived On Time</h2>
    
    <div class="main-content output-content">  
        <label for="ontime">On Time Flights</label>
        <table id="ontime">
            <tr>
                <th>Flight Code</th>
                <th>Arrival Time</th>
            </tr>

            <?php
            $flights = $flights = $connection->query("select * from flight where SArriveTime=AArriveTime");
            $rowCount = 0;

            while ($row = $flights->fetch()) {
                echo "<tr>";

                echo "<td>".$row["Number"].$row["AirlineCode"]."</td>";
                echo "<td>".$row["AArriveTime"]."</td>";

                echo "</tr>";
                $rowCount += 1;
            }

            if ($rowCount <= 0) {
                echo '<p>No flights have arrived on time.</p>';
            }
            ?>

        </table>
    </div>
</div>

</body>
<?php
include 'components/footer.php';
?>

</html>