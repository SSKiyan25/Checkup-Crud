<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coronavirus Report</title>
    <!-- This script dynamically updates the barangay options in the select tag -->
    <!-- It ensures that only barangays belonging to the selected city are displayed to avoid confusions -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const citySelect = document.getElementById('city_id');
            const brgySelect = document.getElementById('brgy_id');

            citySelect.addEventListener('change', function() {
                const cityId = this.value;
                brgySelect.innerHTML = '<option value="" disabled selected>Loading...</option>';

                if (cityId) {
                    fetch(`{{ route('get-brgys-by-city') }}?city_id=${cityId}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Failed to fetch barangays');
                            }
                            return response.json();
                        })
                        .then(data => {
                            let options = '<option value="" disabled selected>Select Barangay</option>';
                            data.forEach(brgy => {
                                options += `<option value="${brgy.id}">${brgy.name}</option>`;
                            });
                            brgySelect.innerHTML = options;
                        })
                        .catch(error => {
                            alert('Failed to fetch barangays. Please try again.');
                            console.error(error);
                        });
                }
            });
        });
    </script>
</head>

<body>
    <h1>Coronavirus Report</h1>
    <form method="GET" action="{{ route('reports.coronavirus') }}">
        <div>
            <label for="city_id">Select City:</label>
            <select name="city_id" id="city_id" required>
                <option value="" disabled selected>Select City</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}" {{ request('city_id') == $city->id ? 'selected' : '' }}>
                        {{ $city->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="brgy_id">Select Barangay:</label>
            <select name="brgy_id" id="brgy_id">
                <option value="" disabled selected>Select Barangay</option>
                @if (request('city_id'))
                    @foreach ($brgys->where('city_id', request('city_id')) as $brgy)
                        <option value="{{ $brgy->id }}" {{ request('brgy_id') == $brgy->id ? 'selected' : '' }}>
                            {{ $brgy->name }}
                        </option>
                    @endforeach
                @endif
            </select>
            <p>
                Select a city first to load the barangays. The barangay list will be populated based on the selected
                city.
            </p>
        </div>
        <div>
            <button type="submit">Generate Report</button>
        </div>
    </form>

    <h2>Report Results</h2>
    <table border="1">
        <tr>
            <th>Total Number of Persons with Coronavirus</th>
            <th>Recovered</th>
            <th>Active</th>
            <th>Death</th>
        </tr>
        <tr>
            <td>{{ ($data['active'] ?? 0) + ($data['recorded'] ?? 0) + ($data['death'] ?? 0) }}</td>
            <td>{{ $data['recorded'] ?? 0 }}</td>
            <td>{{ $data['active'] ?? 0 }}</td>
            <td>{{ $data['death'] ?? 0 }}</td>
        </tr>
    </table>

    <br />
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
        <div>
            <a href="{{ route('reports.awareness') }}">
                Awareness Report
            </a>
        </div>
        <br />
        <div>
            <a href="{{ route('check-status.index') }}"> Check Patient's Status</a>
        </div>
    </div>
</body>

</html>
