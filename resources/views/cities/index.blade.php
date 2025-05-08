<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>City List</title>
</head>

<body>
    <h1>City List</h1>
    <div>
        @if (session()->has('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div>
        <a href="{{ route('cities.create') }}">Click to add City</a>
    </div>
    <div>
        <table border="1">
            <tr>
                <th> ID </th>
                <th>City Name</th>
                <th>Actions</th>
            </tr>
            @foreach ($cities as $city)
                <tr>
                    <td>{{ $city->id }}</td>
                    <td>{{ $city->name }}</td>
                    <td>
                        <a href="{{ route('cities.show', ['city' => $city]) }}">View</a> |
                        <a href="{{ route('cities.edit', ['city' => $city]) }}">Edit</a> |
                        <form method="POST" action="{{ route('cities.destroy', ['city' => $city]) }}"
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
