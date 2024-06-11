<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Log - ROBOT AVIATION</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="favicon.ico">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container-fluid">
        <div class="header">
            <div class="logo">
                <!-- Placeholder for logo -->
                <img src="ra.png" alt="ROBOT AVIATION">
            </div>
            <h1>Flight Operators</h1>
        </div>
        <div class="nav-links">
            <a href="index.php" class="btn btn-primary btn-add">Show All Logs</a>
            <a href="insert.php" class="btn btn-primary btn-add">Add A New Log</a>
            <a href="systems.php" class="btn btn-primary btn-add">Flight Systems</a>
        </div>

        <!-- Buttons to select operators -->
        <div class="system-buttons">
            <?php
            // Array of operators
            $operators = array('Atiq', 'Sergey', 'Hans', 'Knut');
            foreach ($operators as $index => $operator) {
                $buttonColorClass = ($index % 2 == 0) ? 'primary' : 'success';
                echo "<div><a href='?operator=$operator' class='btn btn-$buttonColorClass system-btn'>$operator</a></div>";
            }
            ?>
        </div>

        <!-- Display flight information for the selected operator -->
        <?php
        if (isset($_GET['operator'])) {
            $selectedOperator = $_GET['operator'];
            // Fetch flights for the selected operator from the database
            include 'db.php';

            // Query to get total flight hours
            $totalHoursQuery = "SELECT SUM(FlightTime) AS TotalFlightHours
                                FROM FlightLogs 
                                WHERE SafetyPilot = '$selectedOperator' OR GCSOperator = '$selectedOperator' OR Commander = '$selectedOperator'";
            $totalHoursResult = $connection->query($totalHoursQuery);
            $totalHoursRow = $totalHoursResult->fetch_assoc();
            $totalFlightHours = $totalHoursRow['TotalFlightHours'];

            // Query to get list of flight systems and corresponding hours flown
            $flightSystemsQuery = "SELECT System, SerialNumber, SUM(FlightTime) AS TotalFlightHours
                                    FROM FlightLogs 
                                    WHERE SafetyPilot = '$selectedOperator' OR GCSOperator = '$selectedOperator' OR Commander = '$selectedOperator'
                                    GROUP BY System, SerialNumber";
            $flightSystemsResult = $connection->query($flightSystemsQuery);

            // Query to get hours flown as a pilot, commander, and operator
            $pilotHoursQuery = "SELECT SUM(FlightTime) AS PilotHours
                                FROM FlightLogs 
                                WHERE SafetyPilot = '$selectedOperator'";
            $pilotHoursResult = $connection->query($pilotHoursQuery);
            $pilotHoursRow = $pilotHoursResult->fetch_assoc();
            $pilotHours = $pilotHoursRow['PilotHours'];

            $commanderHoursQuery = "SELECT SUM(FlightTime) AS CommanderHours
                                    FROM FlightLogs 
                                    WHERE Commander = '$selectedOperator'";
            $commanderHoursResult = $connection->query($commanderHoursQuery);
            $commanderHoursRow = $commanderHoursResult->fetch_assoc();
            $commanderHours = $commanderHoursRow['CommanderHours'];

            $operatorHoursQuery = "SELECT SUM(FlightTime) AS OperatorHours
                                    FROM FlightLogs 
                                    WHERE GCSOperator = '$selectedOperator'";
            $operatorHoursResult = $connection->query($operatorHoursQuery);
            $operatorHoursRow = $operatorHoursResult->fetch_assoc();
            $operatorHours = $operatorHoursRow['OperatorHours'];
            ?>
            <div class="system-info text-center">
                <p>Hours Flown as a Pilot: <?php echo $pilotHours; ?></p>
                <p>Hours Flown as a Commander: <?php echo $commanderHours; ?></p>
                <p>Hours Flown as an Operator: <?php echo $operatorHours; ?></p>
                <p>Total Flight Hours for <?php echo $selectedOperator; ?>: <?php echo $totalFlightHours; ?></p>
                <h3>Flight Systems and Corresponding Hours Flown:</h3>
                <table class='table table-striped'>
                    <thead>
                        <tr>
                            <th>System</th>
                            <th>Serial Number</th>
                            <th>Total Flight Hours</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $flightSystemsResult->fetch_assoc()) {
                            echo "<tr><td>{$row['System']}</td><td>{$row['SerialNumber']}</td><td>{$row['TotalFlightHours']}</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php
            $connection->close();
        }
        ?>
        <div id="flight-info-container"></div>

        <!-- Footer -->
        <footer>
            <div class="footer-container">
                <p>&copy; 2024, Developed by <a href="https://atiq.no/">Atiq</a>.</p>
            </div>
        </footer>
    </div>

    <!-- JavaScript libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
