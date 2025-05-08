<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reports</title>
</head>

<body>
    <h1>Reports</h1>
    <div>
        <a href="{{ route('reports.awareness') }}">Awareness Report</a>
    </div>
    <div>
        <a href="{{ route('reports.coronavirus') }}">Corona Virus Report</a>
    </div>
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
    </div>
</body>

</html>
