document.addEventListener("DOMContentLoaded", function() {
    // Function to append units to input values
    function appendUnit(inputId, unit) {
        var inputElement = document.getElementById(inputId);
        inputElement.addEventListener("input", function() {
            var inputValue = this.value.trim(); // Remove leading/trailing whitespace
            if (inputValue !== "") {
                this.value = inputValue + " " + unit; // Append unit to the input value
            }
        });
    }

    // Append units to specific input fields
    appendUnit("mass", "KG");
    appendUnit("temp", "°C");
    appendUnit("elevation", "Meters");
    appendUnit("wind_speed", "m/s");
    appendUnit("battery_capacity", "mah");
});

document.addEventListener("DOMContentLoaded", function() {
    // Function to fetch flight details for the selected serial number
    function fetchFlightDetails(system, serial) {
        // Send an AJAX request to details.php
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Parse JSON response and update the flight information
                    var flightInfo = JSON.parse(xhr.responseText);
                    updateFlightInfo(flightInfo);
                } else {
                    console.error('Error fetching flight details');
                }
            }
        };
        xhr.open('GET', 'details.php?system=' + system + '&serial=' + serial);
        xhr.send();
    }

    // Function to update flight information on the page
    function updateFlightInfo(flightInfo) {
        var infoContainer = document.getElementById('flight-info-container');
        if (flightInfo.length > 0) {
            // Prepare HTML for the flight information table
            var html = '<h3>Flight Information</h3>';
            html += '<table class="table">';
            html += '<thead><tr><th>Date</th><th>Pilot</th></tr></thead>';
            html += '<tbody>';
            flightInfo.forEach(function(flight) {
                html += '<tr>';
                html += '<td>' + flight.Date + '</td>';
                html += '<td>' + flight.SafetyPilot + '</td>';
                html += '</tr>';
            });
            html += '</tbody></table>';
            infoContainer.innerHTML = html;
        } else {
            infoContainer.innerHTML = '<p>No flight information found.</p>';
        }
    }

    // Attach click event listener to serial number buttons
    var serialButtons = document.querySelectorAll('.serial-button');
    serialButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var system = button.getAttribute('data-system');
            var serial = button.textContent.trim();
            fetchFlightDetails(system, serial);
        });
    });
});
