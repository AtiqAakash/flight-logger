<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Log - ROBOT AVIATION</title>
    <!-- External CSS libraries -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="favicon.ico">
    <link rel="stylesheet" href="styles.css"> <!-- External custom styles -->
</head>
<body>
    <div class="container-fluid">
        <!-- Header Section -->
        <div class="header">
            <div class="logo">
                <!-- Placeholder for logo -->
                <img src="ra.png" alt="ROBOT AVIATION">
            </div>
            <h1>Flight Systems</h1>
        </div>
        <!-- Navigation Links -->
        <div class="nav-links">
            <a href="index.php" class="btn btn-primary btn-add">Show All Logs</a>
            <a href="insert.php" class="btn btn-primary btn-add">Add A New Log</a>
            <a href="operator.php" class="btn btn-primary btn-add">Flight Operators</a>
        </div>

        <!-- List of systems as buttons -->
        <div class="system-buttons">
            <?php
            // Assume $systems is an array containing the list of systems
            $systems = array('FX-10', 'FX-10NG', 'FX-20', 'FX-Y', 'FX-450');
            foreach ($systems as $index => $system) {
                // Determine button color based on index
                $buttonColorClass = ($index % 2 == 0) ? 'primary' : 'success';
                // Generate system buttons dynamically
                echo "<div><a href='?system=$system' class='btn btn-$buttonColorClass system-btn'>$system</a></div>";
            }
            ?>
        </div>

        <!-- Display total flight hours and flight dates -->
        <?php
        if (isset($_GET['system'])) {
            $selectedSystem = $_GET['system'];
            // Fetch serial numbers for the selected system from the database
            include 'db.php'; // Include database connection file
            $sql = "SELECT DISTINCT SerialNumber FROM FlightLogs WHERE System = '$selectedSystem'";
            $result = $connection->query($sql);

            // Wrap the serial number list and message in a div
            echo "<div class='system-info text-center'>";
            if ($result->num_rows > 0) {
                // Display the list of available serial numbers
                echo "<h3>List of Available Systems for $selectedSystem</h3>";
                echo "<div class='btn-group-vertical'>";
                while ($row = $result->fetch_assoc()) {
                    // Make each serial number clickable with a link to detailed information
                    echo "<a href='details.php?system=$selectedSystem&serial={$row['SerialNumber']}' class='btn btn-outline-primary btn-sm mb-2 serial-number-btn' style='width: 220px;'>$row[SerialNumber]</a>";
                }
                echo "</div>";
            } else {
                // If no records found, display a message
                echo "<h3>No available Systems found for $selectedSystem</h3>";
            }
            echo "</div>";

            $connection->close(); // Close database connection
        }
        ?>
        <div id="flight-info-container"></div>

        <!-- Footer Section -->
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
