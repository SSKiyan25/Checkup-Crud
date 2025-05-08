<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brgy;
use App\Models\City;
use App\Http\Requests\BrgyRequest;
use App\Http\Resources\BrgyResource;
use App\Http\Resources\CityResource;
use Illuminate\Support\Facades\Log;


class BrgyController extends Controller
{
    // This controller handles CRUD operations for Barangays (bgrys)

    // This method is used to display a list of all Barangays upon visiting the index page.
    public function index()
    {
        $brgys = Brgy::with('city')->get();
        return view('brgys.index', ['brgys' => BrgyResource::collection($brgys)]);
    }

    // This method is used to display a list of all Baranggays to populate the dropdown selection values in the create page
    public function create()
    {
        // Fetch all cities to populate the dropdown selection values
        $cities = City::with('brgys')->get();
        $cityResource = CityResource::collection($cities);
        return view('brgys.create', ['cities' => $cityResource]);
    }

    public function store(BrgyRequest $request)
    {
        try {
            // Before it will get added to the database, it will validate the data requested first
            // The validation file is located in app/Http/Requests/BrgyRequest.php
            $data = $request->validated();
            $newBrgy = Brgy::create($data);
            return redirect()->route('brgys.index')->with('success', 'Barangay ' . $newBrgy['name'] . ' created successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating Barangay: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create Barangay. Please try again.');
        }
    }

    // This method is used to display the details of a specific Barangay viewed/selected by the user in the Brgys Table index page
    public function show(Brgy $brgy)
    {
        $data = new BrgyResource($brgy);
        return view('brgys.show', ['brgy' => $data]);
    }

    public function edit(Brgy $brgy)
    {
        // Fetch all cities to populate the dropdown selection
        $cities = City::with('brgys')->get();
        return view('brgys.edit', ['brgy' => $brgy, 'cities' => $cities]);
    }

    public function update(Brgy $brgy, BrgyRequest $request)
    {
        try {
            // Before it will get updated in the database, it will validate the data requested first
            // It follows the same validation rules as the store method
            $data = $request->validated();
            $brgy->update($data);
            return redirect()->route('brgys.index')->with('success', 'Barangay updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating Barangay: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update Barangay. Please try again.');
        }
    }

    public function destroy(Brgy $brgy)
    {
        try{
            $brgy->delete();
            return redirect()->route('brgys.index')->with('success', 'Barangay deleted successfully.');
        } catch( \Exception $e) {
            Log::error('Error deleting Barangay: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete Barangay. Please try again.');
        }
    }
}