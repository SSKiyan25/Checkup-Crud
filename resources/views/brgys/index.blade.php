<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Barangay List</title>
</head>

<body>
    <h1>Barangay List</h1>
    <div>
        @if (session()->has('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div>
        <a href="{{ route('brgys.create') }}">Click to add Barangay</a>
    </div>
    <div>
        <table border="1">
            <tr>
                <th> ID </th>
                <th>Name</th>
                <th>City</th>
                <th>Actions</th>
            </tr>
            @foreach ($brgys as $brgy)
                <tr>
                    <td>{{ $brgy->id }}</td>
                    <td>{{ $brgy->name }}</td>
                    <td>{{ $brgy->city->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('brgys.show', ['brgy' => $brgy]) }}">View</a> |
                        <a href="{{ route('brgys.edit', ['brgy' => $brgy]) }}">Edit</a> |
                        <form method="POST" action="{{ route('brgys.destroy', ['brgy' => $brgy]) }}"
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
            <a href="{{ route('patients.index') }}">Patient List</a>
        </div>
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
