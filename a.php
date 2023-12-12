<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Hospital Clock</title>
</head>
<body>
    <div id="healthStatus"></div>

    <script>
        function fetchHealthStatus() {
            // Use AJAX (or fetch API) to get health status from the backend
            fetch('index.php')
                .then(response => response.json())
                .then(data => {
                    displayHealthStatus(data);
                })
                .catch(error => console.error('Error:', error));
        }

        function displayHealthStatus(healthStatus) {
            // Update the frontend based on the health status received
            const healthStatusDiv = document.getElementById('healthStatus');
            healthStatusDiv.innerHTML = `<pre>${JSON.stringify(healthStatus, null, 2)}</pre>`;
        }

        // Fetch health status on page load
        fetchHealthStatus();

        // Implement real-time updates or periodic fetching as needed
        // setInterval(fetchHealthStatus, 5000); // Example: Fetch every 5 seconds
    </script>
</body>
</html>
