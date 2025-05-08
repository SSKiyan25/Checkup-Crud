<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Patient Data</title>
</head>

<body>
    <h1>Create a Patient Data</h1>
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
        <form method="POST" action="{{ route('patients.store') }}">
            @csrf
            @method('POST')
            <div>
                <label>Name</label>
                <input type="text" name="name" placeholder="Name" required>
                <br />
                <label>Brgy</label>
                <select name="brgy_id" id="brgy_id">
                    <option value="" disabled selected>Select Brgy</option>
                    @foreach ($brgys as $brgy)
                        <option value="{{ $brgy->id }}">{{ $brgy->name }}</option>
                    @endforeach
                </select>
                <br />
                <label>Number</label>
                <input type="text" name="number" placeholder="Number" required>
                <br />
                <label>Email</label>
                <input type="email" name="email" placeholder="Email (Optional)">
                <br />
                <label>Case Type</label>
                <select name="case_type" id="case_type">
                    <option value="" disabled selected>Select Case Type</option>
                    <option value="PUI">PUI</option>
                    <option value="PUM">PUM</option>
                    <option value="Positive on Covid">Positive on Covid</option>
                    <option value="Negative on Covid">Negative on Covid</option>
                </select>
                <br />
                <label>Coronavirus Status</label>
                <select name="coronavirus_status" id="coronavirus_status">
                    <option value="" disabled selected>Select Coronavirus Status</option>
                    <option value="active">Active</option>
                    <option value="recorded">Recorded</option>
                    <option value="death">Death</option>
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
