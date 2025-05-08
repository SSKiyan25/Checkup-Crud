<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit {{ $patient->name }}</title>
</head>

<body>
    <h1>Edit Patient Data of {{ $patient->name }}</h1>
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
        <form method="POST" action="{{ route('patients.update', ['patient' => $patient]) }}">
            @csrf
            @method('PATCH')
            <div>
                <label>Name</label>
                <input type="text" name="name" placeholder="Name" value="{{ $patient->name }}" required>
                <br />
                <label>Brgy</label>
                <!-- Assuming that the user can select a barangay outside the city they were part with based on the current brgy. -->
                <!-- Then display all brgys existed -->
                <select name="brgy_id" id="brgy_id">
                    <option value="" disabled selected>Select Brgy</option>
                    @foreach ($brgys as $brgy)
                        <option value="{{ $brgy->id }}" {{ $brgy->id == $patient->brgy_id ? 'selected' : '' }}>
                            {{ $brgy->name }}
                        </option>
                    @endforeach
                </select>
                <br />
                <label>Number</label>
                <input type="text" name="number" placeholder="Number" value="{{ $patient->number }}" required>
                <br />
                <label>Email</label>
                <input type="email" name="email" placeholder="Email (Optional)" value="{{ $patient->email }}">
                <br />
                <label>Case Type</label>
                <select name="case_type" id="case_type">
                    <option value="" disabled>Select Case Type</option>
                    <option value="PUI" {{ $patient->case_type == 'PUI' ? 'selected' : '' }}>PUI</option>
                    <option value="PUM" {{ $patient->case_type == 'PUM' ? 'selected' : '' }}>PUM</option>
                    <option value="Positive on Covid"
                        {{ $patient->case_type == 'Positive on Covid' ? 'selected' : '' }}>Positive on Covid</option>
                    <option value="Negative on Covid"
                        {{ $patient->case_type == 'Negative on Covid' ? 'selected' : '' }}>Negative on Covid</option>
                </select>
                <br />
                <label>Coronavirus Status</label>
                <select name="coronavirus_status" id="coronavirus_status">
                    <option value="" disabled>Select Coronavirus Status</option>
                    <option value="active" {{ $patient->coronavirus_status == 'active' ? 'selected' : '' }}>Active
                    </option>
                    <option value="recorded" {{ $patient->coronavirus_status == 'recorded' ? 'selected' : '' }}>
                        Recorded</option>
                    <option value="death" {{ $patient->coronavirus_status == 'death' ? 'selected' : '' }}>Death
                    </option>
                </select>
            </div>
            <div>
                <input type="submit" value="Save">
            </div>
        </form>
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
