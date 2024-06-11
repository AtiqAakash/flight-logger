<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Flight Log Details - ROBOT AVIATION</title>
    <!-- External CSS libraries -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Main container -->
    <div class="container-fluid">
        <!-- Header Section -->
        <div class="header">
            <!-- Logo -->
            <div class="logo">
                <!-- Placeholder for logo -->
                <img src="ra.png" alt="ROBOT AVIATION">
            </div>
            <!-- Page Title -->
            <h1>Flight Log Details</h1>
        </div>

        <!-- Display flight information -->
        <div class="flight-info">
            <?php
            // Check if system and serial number are provided
            if (isset($_GET['system']) && isset($_GET['serial'])) {
                // Get system and serial number from URL parameters
                $selectedSystem = $_GET['system'];
                $selectedSerialNumber = $_GET['serial'];

                // Include database connection
                include 'db.php';

                // Query to fetch flight information for the selected serial number
                $sql = "SELECT Date, SafetyPilot, Commander, GCSOperator, FlightTime
                        FROM FlightLogs 
                        WHERE System = '$selectedSystem' AND SerialNumber = '$selectedSerialNumber'
                        ORDER BY Date DESC"; // Order by date in descending order
                $result = $connection->query($sql);

                // Check if there are any records
                if ($result->num_rows > 0) {
                    // Display the table header
                    echo "<h3>Flight Information for System {$selectedSerialNumber}</h3>";
                    echo "<table class='table'>";
                    echo "<thead><tr><th>Date</th><th>Safety Pilot</th><th>Commander</th><th>Operator</th><th>Flight Time (hours)</th></tr></thead>";
                    echo "<tbody>";

                    // Initialize total flight hours
                    $totalFlightHours = 0;

                    // Loop through the fetched data and display it in the table
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['Date']}</td>";
                        echo "<td>{$row['SafetyPilot']}</td>";
                        echo "<td>{$row['Commander']}</td>";
                        echo "<td>{$row['GCSOperator']}</td>";
                        echo "<td>{$row['FlightTime']}</td>";
                        echo "</tr>";

                        // Add flight time to total flight hours
                        $totalFlightHours += (float) $row['FlightTime']; // Ensure FlightTime is converted to float
                    }

                    echo "</tbody>";
                    echo "</table>";

                    // Display total flight hours
                } else {
                    // If no records found, display a message
                    echo "<p>No flight information available for Serial Number {$selectedSerialNumber}</p>";
                }

                // Close database connection
                $connection->close();
            } else {
                // If system or serial number not provided, display an error message
                echo "<p>Error: System or Serial Number not provided.</p>";
            }
            ?>
        </div>

        <!-- Back button -->
        <div class="back-btn">
            <a href="javascript:history.back()" class="btn btn-primary">Back</a>
        </div>
    </div>

    <!-- JavaScript libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
