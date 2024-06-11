<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Log - ROBOT AVIATION</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="favicon.ico">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Header Section -->
    <div class="header">
        <div class="logo">
            <!-- Logo Image -->
            <img src="ra.png" alt="ROBOT AVIATION">
        </div>
        <!-- Navigation Links -->
        <div class="nav-links">
            <a href="index.php" class="btn btn-primary btn-add">Show All Logs</a>
            <a href="systems.php" class="btn btn-primary btn-add">Flight Systems</a>
            <a href="operator.php" class="btn btn-primary btn-add">Flight Operators</a>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="container">
        <!-- Form Heading -->
        <h2 class="text-center">Add New Flight Log</h2>
        <!-- Flight Log Form -->
        <form action="insert.php" method="post">
            <!-- Flight Number Input -->
            <div class="form-group">
                <label for="flight_number" class="form-label">Flight Number</label>
                <input type="text" class="form-control form-control-sm" id="flight_number" name="flight_number" required>
            </div>
            <!-- Date Input -->
            <div class="form-group">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control form-control-sm" id="date" name="date" required>
            </div>
            <!-- Location Input -->
            <div class="form-group">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control form-control-sm" id="location" name="location" required>
            </div>
            <!-- Elevation Input -->
            <div class="form-group">
                <label for="elevation" class="form-label">Elevation</label>
                <input type="text" class="form-control form-control-sm" id="elevation" name="elevation">
            </div>
            <!-- Temperature Input -->
            <div class="form-group">
                <label for="temp" class="form-label">Temp</label>
                <input type="text" class="form-control form-control-sm" id="temp" name="temp">
            </div>
            <!-- Weather Selection -->
            <div class="form-group">
                <label for="weather" class="form-label">Weather</label>
                <select class="form-control form-control-sm" id="weather" name="weather">
                    <option value="Sunny">Sunny</option>
                    <option value="Cloudy">Cloudy</option>
                    <option value="Rainy">Rainy</option>
                    <option value="Snowy">Snowy</option>
                    <option value="Misty">Misty</option>
                </select>
            </div>
            <!-- Wind Speed Input -->
            <div class="form-group">
                <label for="wind_speed" class="form-label">Wind Speed</label>
                <input type="text" class="form-control form-control-sm" id="wind_speed" name="wind_speed">
            </div>
            <!-- Wind Direction Input -->
            <div class="form-group">
                <label for="wind_direction" class="form-label">Wind Direction</label>
                <input type="text" class="form-control form-control-sm" id="wind_direction" name="wind_direction">
            </div>
            <!-- Type of Flight Input -->
            <div class="form-group">
                <label for="type_of_flight" class="form-label">Type of Flight</label>
                <input type="text" class="form-control form-control-sm" id="type_of_flight" name="type_of_flight">
            </div>
            <!-- Safety Pilot Selection -->
            <div class="form-group">
                <label for="safety_pilot" class="form-label">Safety Pilot</label>
                <select class="form-control form-control-sm" id="safety_pilot" name="safety_pilot">
                    <option value="Atiq">Atiq</option>
                    <option value="Sergey">Sergey</option>
                    <option value="Hans">Hans</option>
                    <option value="Knut">Knut</option>
                </select>
            </div>
            <!-- GCS Operator Selection -->
            <div class="form-group">
                <label for="gcs_operator" class="form-label">GCS Operator</label>
                <select class="form-control form-control-sm" id="gcs_operator" name="gcs_operator">
                    <option value="Atiq">Atiq</option>
                    <option value="Sergey">Sergey</option>
                    <option value="Hans">Hans</option>
                    <option value="Knut">Knut</option>
                </select>
            </div>
            <!-- Commander Selection -->
            <div class="form-group">
                <label for="commander" class="form-label">Commander</label>
                <select class="form-control form-control-sm" id="commander" name="commander">
                    <option value="Atiq">Atiq</option>
                    <option value="Sergey">Sergey</option>
                    <option value="Hans">Hans</option>
                    <option value="Knut">Knut</option>
                </select>
            </div>
            <!-- System Selection -->
            <div class="form-group">
                <label for="system" class="form-label">System</label>
                    <select class="form-control form-control-sm" id="system" name="system">
                        <option value="FX-10">FX-10</option>
                        <option value="FX-10NG">FX-10NG</option>
                        <option value="FX-Y">FX-Y</option>
                        <option value="FX-450">FX-450</option>
                        <option value="FX-20">FX-450</option>
                    </select>
            </div>
            <!-- Serial Number Input -->
            <div class="form-group">
                <label for="serial_number" class="form-label">Serial Number</label>
                <input type="text" class="form-control form-control-sm" id="serial_number" name="serial_number">
            </div>
            <!-- Mass Input -->
            <div class="form-group">
                <label for="mass" class="form-label">Mass (KG)</label>
                <input type="text" class="form-control form-control-sm" id="mass" name="mass">
            </div>
            <!-- Battery Type Input -->
            <div class="form-group">
                <label for="battery_type" class="form-label">Battery Type</label>
                <input type="text" class="form-control form-control-sm" id="battery_type" name="battery_type">
            </div>
            <!-- Battery Capacity Input -->
            <div class="form-group">
                <label for="battery_capacity" class="form-label">Battery Capacity</label>
                <input type="text" class="form-control form-control-sm" id="battery_capacity" name="battery_capacity">
            </div>
            <!-- Fuel Type Input -->
            <div class="form-group">
                <label for="fuel_type" class="form-label">Fuel Type</label>
                <input type="text" class="form-control form-control-sm" id="fuel_type" name="fuel_type">
            </div>
            <!-- Fuel Amount Filled Input -->
            <div class="form-group">
                <label for="fuel_amount_filled" class="form-label">Fuel Amount Filled</label>
                <input type="text" class="form-control form-control-sm" id="fuel_amount_filled" name="fuel_amount_filled">
            </div>
            <!-- Fuel Consumed Input -->
            <div class="form-group">
                <label for="fuel_consumed" class="form-label">Fuel Consumed</label>
                <input type="text" class="form-control form-control-sm" id="fuel_consumed" name="fuel_consumed">
            </div>
            <!-- System Startup Time Input -->
            <div class="form-group">
                <label for="system_startup_time" class="form-label">System Startup Time</label>
                <input type="time" class="form-control form-control-sm" id="system_startup_time" name="system_startup_time">
            </div>
            <!-- Take Off Time Input -->
            <div class="form-group">
                <label for="takeoff_time" class="form-label">Take Off Time</label>
                <input type="time" class="form-control form-control-sm" id="takeoff_time" name="takeoff_time">
            </div>
            <!-- Touchdown Time Input -->
            <div class="form-group">
                <label for="touchdown_time" class="form-label">Touchdown Time</label>
                <input type="time" class="form-control form-control-sm" id="touchdown_time" name="touchdown_time">
            </div>
            <!-- System Power Off Time Input -->
            <div class="form-group">
                <label for="system_power_off_time" class="form-label">System Power Off Time</label>
                <input type="time" class="form-control form-control-sm" id="system_power_off_time" name="system_power_off_time">
            </div>
            <!-- System Time Input -->
            <div class="form-group">
                <label for="system_time" class="form-label">System Time</label>
                <input type="time" class="form-control form-control-sm" id="system_time" name="system_time">
            </div>
            <!-- Notes Input -->
            <div class="form-group">
                <label for="notes" class="form-level">Notes</label>
                <textarea class="form-control form-control-sm" id="notes" name="notes"></textarea>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>

    <!-- PHP Script -->
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $connection = new mysqli("localhost", "root", "", "flight_logs");

            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            // Collecting Form Data
            $flight_number = $_POST['flight_number'] ?? '';
            $date = $_POST['date'] ?? '';
            $location = $_POST['location'] ?? '';
            // Other form fields...

            // Calculating Flight Time
            $start_time = strtotime($system_startup_time);
            $end_time = strtotime($system_power_off_time);
            $flight_time = round(($end_time - $start_time) / 60);

            // SQL Query
            $sql = "INSERT INTO FlightLogs (...) 
                    VALUES (...)";

            // Executing SQL Query
            if ($connection->query($sql) === TRUE) {
                exit(); // Exiting if successful
            } else {
                echo "Error: " . $sql . "<br>" . $connection->error;
            }

            $connection->close(); // Closing Database Connection
        }
    ?>

    <!-- JavaScript Files -->
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- Footer Section -->
    <footer>
        <div class="footer-container">
            <p>&copy; 2024, Developed by <a href="https://atiq.no/">Atiq</a>.</p>
        </div>
    </footer>
</body>
</html>
