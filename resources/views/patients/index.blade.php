<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patient List</title>
</head>

<body>
    <h1>Patient List</h1>
    <div>
        @if (session()->has('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div>
        <a href="{{ route('patients.create') }}">Click to add Patient</a>
    </div>
    <div>
        <table border="1">
            <tr>
                <th> ID </th>
                <th>Name</th>
                <th>City</th>
                <th>Barangay</th>
                <th>Case Type</th>
                <th>Actions</th>
            </tr>
            @foreach ($patients as $patient)
                <tr>
                    <td>{{ $patient->id }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->brgy->city->name ?? 'N/A' }}</td>
                    <td>{{ $patient->brgy->name ?? 'N/A' }}</td>
                    <td>{{ $patient->case_type }}</td>
                    <td>
                        <a href="{{ route('patients.show', ['patient' => $patient]) }}">View</a> |
                        <a href="{{ route('patients.edit', ['patient' => $patient]) }}">Edit</a> |
                        <form method="POST" action="{{ route('patients.destroy', ['patient' => $patient]) }}"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
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
