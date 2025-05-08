<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>City List</title>
</head>

<body>
    <h1>Patients Checkup CRUD System </h1>
    <a href="{{ route('cities.index') }}">
        <h2>City List</h2>
    </a>
    <a href="{{ route('brgys.index') }}">
        <h2>Barangay List</h2>
    </a>
    <a href="{{ route('patients.index') }}">
        <h2>Patients</h2>
    </a>
    <a href="{{ route('reports.index') }}">
        <h2>Reports</h2>
    </a>
    <a href="{{ route('check-status.index') }}">
        <h2>Check Patient's Status</h2>
    </a>
</body>

</html>
