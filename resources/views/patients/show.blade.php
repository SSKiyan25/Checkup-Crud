<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $patient->name }}</title>
</head>

<body>
    <h1>Show Patient Data of {{ $patient->name }} </h1>
    <div>
        <div>
            <h2>Name: {{ $patient->name }}</h2>
            <h3>Barangay Name: {{ $patient->brgy->name ?? 'N/A' }}</h3>
            <h4>Number: {{ $patient->number }}</h4>
            <h4>Email: {{ $patient->email ?? 'None' }}</h4>
            <h4>Case Type: {{ $patient->case_type }}</h4>
        </div>
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
        <br />
        <div>
            <a href="{{ route('check-status.index') }}"> Check Patient's Status</a>
        </div>
    </div>
</body>

</html>
