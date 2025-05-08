<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit {{ $brgy->name }}</title>
</head>

<body>
    <h1>Edit {{ $brgy->name }}</h1>
    <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div>
        <form method="POST" action="{{ route('brgys.update', ['brgy' => $brgy]) }}">
            @csrf
            @method('PATCH')
            <div>
                <label>Brgy Name</label>
                <input type="text" name="name" placeholder="Brgy Name" value="{{ $brgy->name }}" required>
                <br />
                <label>City</label>
                <select name="city_id" id="city_id">
                    <option value="" disabled selected>Select City</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}" {{ $city->id == $brgy->city_id ? 'selected' : '' }}>
                            {{ $city->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <input type="submit" value="Save">
            </div>
        </form>
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
