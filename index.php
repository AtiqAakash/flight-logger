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
                <img src="ra.png" alt="ROBOT AVIATION">
            </div>
            <h1>Flight Logs</h1>
        </div>
        <div class="nav-links">
            <a href="insert.php" class="btn btn-primary btn-add">Add A New Log</a>
            <a href="systems.php" class="btn btn-primary btn-add">Flight Systems</a>
            <a href="operator.php" class="btn btn-primary btn-add">Flight Operators</a>
        </div>
        <div class="table-container">
            <table class="table table-sm table-bordered table-hover">
                <thead>
                    <!-- Column names -->
                </thead>
                <tbody>
                    <?php
                    include 'db.php';

                    // Pagination logic
                    $limit = 10; // Number of entries per page
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $start = ($page - 1) * $limit;

                    $sql = "SELECT COUNT(*) FROM FlightLogs";
                    $result = $connection->query($sql);
                    $total = $result->fetch_row()[0];
                    $pages = ceil($total / $limit);

                    $sql = "SELECT * FROM FlightLogs ORDER BY Date DESC LIMIT $start, $limit";
                    $result = $connection->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <!-- Table data -->
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='27' class='text-center'>No records found</td></tr>";
                    }
                    $connection->close();
                    ?>
                </tbody>
            </table>
        </div>

        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="index.php?page=<?php echo $page - 1; ?>" class="btn btn-outline-primary">Previous</a>
            <?php endif; ?>

            <?php if ($page < $pages): ?>
                <a href="index.php?page=<?php echo $page + 1; ?>" class="btn btn-outline-primary">Next</a>
            <?php endif; ?>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <footer>
        <div class="footer-container">
            <p>&copy; 2024, Developed by <a href="https://atiq.no/">Atiq</a>.</p>
        </div>
    </footer>
</body>
</html>
