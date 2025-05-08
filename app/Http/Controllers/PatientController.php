<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Http\Resources\PatientResource;
use App\Http\Requests\PatientRequest;
use App\Models\Brgy;
use App\Notifications\CaseTypeUpdated;
use App\Http\Resources\BrgyResource;

class PatientController extends Controller
{
    // This controller handles the CRUD operations for patients

    // This method is used to display a list of all patients upon visiting the index page.
    public function index()
    {
        $patients = Patient::with(['brgy'])->get();
        return view('patients.index', ['patients' => PatientResource::collection($patients)]);
    }

    public function create()
    {
        $brgys = Brgy::with('city')->get();
        $brgysResource = BrgyResource::collection($brgys);
        return view('patients.create', ['brgys' => $brgysResource]);
    }

    public function store(PatientRequest $request)
    {
        // Before it will get added to the database, it will validate the data requested first
        // The validation file is located in app/Http/Requests/PatientRequest.php
        $data = $request->validated();

        $newPatient = Patient::create($data);
        return redirect()->route('patients.index')->with('success', 'Patient ' . $newPatient['name'] . ' created successfully.');
    }

    public function show(Patient $patient)
    {
        $data = new PatientResource($patient);
        return view('patients.show', ['patient' => $data]);
    }

    public function edit(Patient $patient)
    {
        $brgys = Brgy::with('city')->get();
        return view('patients.edit', ['patient' => $patient, 'brgys' => $brgys]);
    }

    public function update(Patient $patient, PatientRequest $request)
    {
        $data = $request->validated();

        // Check if the patient's case type has changed
        $oldCaseType = $patient->case_type;
        $newCaseType = $data['case_type'];

        if ($oldCaseType !== $newCaseType) {
            $patient->update($data);

            // Check if the patient has an email
            if ($patient->email) {
                // Send the email notification upon validated
                $patient->notify(new CaseTypeUpdated($patient, $oldCaseType, $newCaseType));
                $message = 'Patient updated successfully, and notification email sent. If you do not see the email, please check your spam folder.';
            } else {
                $message = 'Patient updated successfully, but no email was sent as the patient does not have an email address.';
            }   
        } else {
            $patient->update($data);
            $message = 'Patient updated successfully.';
        }

        return redirect()->route('patients.index')->with('success', $message);
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }

    // This method is used to pass the patients data to the check status page
    public function checkStatus()
    {
        $patients = Patient::all();
        return view('check-status.index', ['patients' => PatientResource::collection($patients)]);
    }
}