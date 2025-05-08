<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check Patient Status</title>
    <script>
        // This script will handle the status checking
        // This approach works well for small datasets for faster response times and to avoid high number of requests to the server.
        document.addEventListener('DOMContentLoaded', function() {
            const patients = @json($patients); // Fetch all patients from the server
            const input = document.getElementById('number');
            const resultDiv = document.getElementById('result');

            document.getElementById('checkStatusBtn').addEventListener('click', function() {
                const number = input.value.trim();
                const patient = patients.find(p => p.number === number);

                if (patient) {
                    resultDiv.innerHTML = `
                        <p><strong>Name:</strong> ${patient.name}</p>
                        <p><strong>Case Type:</strong> ${formatCaseType(patient.case_type)}</p>
                        <p><strong>Coronavirus Status:</strong> ${formatCoronavirusStatus(patient.coronavirus_status)}</p>
                    `;
                } else {
                    resultDiv.innerHTML =
                        '<p style="color: red;">No patient found with this contact number.</p>';
                }
            });

            // Helper function to format case type
            function formatCaseType(caseType) {
                const caseTypes = {
                    'PUI': 'Person Under Investigation',
                    'PUM': 'Person Under Monitoring',
                    'Positive on Covid': 'Positive on Covid',
                    'Negative on Covid': 'Negative on Covid'
                };
                return caseTypes[caseType] || caseType;
            }

            // Helper function to format coronavirus status
            function formatCoronavirusStatus(status) {
                const statuses = {
                    'active': 'Active',
                    'recorded': 'Recovered',
                    'death': 'Death'
                };
                return statuses[status] || status;
            }
        });
    </script>
</head>

<body>
    <h1>Check Your Status</h1>

    <div>
        <label for="number">Enter Your Contact Number:</label>
        <input type="text" id="number" placeholder="Contact Number" required>
        <button id="checkStatusBtn">Check Status</button>
    </div>

    <div id="result" style="margin-top: 20px;">
        <!-- Status result will be displayed here -->
    </div>

    <div>
        <div>
            <a href="/">Back to home</a>
        </div>
        <br />
        <div>
            <a href="{{ route('cities.index') }}">City List</a>
        </div>
        <br />
        <div>
            <a href="{{ route('brgys.index') }}">Barangay List</a>
        </div>
        <br />
        <div>
            <a href="{{ route('patients.index') }}">Patients List</a>
        </div>
        <br />
        <div>
            <a href="{{ route('reports.index') }}">
                <h2>Reports</h2>
            </a>
        </div>
    </div>
</body>

</html>
