<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Http\Requests\CityRequest;
use App\Http\Resources\CityResource;
use Illuminate\Support\Facades\Log;

class CityController extends Controller
{
    //This controller handles CRUD operations for Cities (cities)

    //This method is used to display a list of all Cities upon visiting the index page.
    public function index()
    {
        $cities = City::all();
        return view('cities.index', ['cities' => CityResource::collection($cities)]);
    }

    public function create()
    {
        return view('cities.create');
    }

    public function store(CityRequest $request)
    {
        try{
            // Before it will get added to the database, it will validate the data requested first
            // The validation file is located in app/Http/Requests/CityRequest.php
            $data = $request->validated();
            $newCity = City::create($data);
            return redirect()->route('cities.index')->with('success', 'City ' . $newCity['name'] . ' created successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating City: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create City. Please try again.');
        }
    }

    // This method is used to display the details of a specific City viewed/selected by the user in the Cities Table index page
    public function show(City $city)
    {
        $data = new CityResource($city);
        return view('cities.show', ['city' => $data]);
    }

    public function edit(City $city)
    {
        $cities = City::all();
        return view('cities.edit', ['city' => $city, 'cities' => $cities]);
    }

    public function update(City $city, CityRequest $request)
    {
        try {
            // Before it will get updated in the database, it will validate the data requested first
            // It follows the same validation rules as the store method
            $data = $request->validated();
            $city->update($data);
            return redirect()->route('cities.index')->with('success', 'City updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating City: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update City. Please try again.');
        }
    }

    public function destroy(City $city)
    {
        try {
            $city->delete();
            return redirect()->route('cities.index')->with('success', 'City deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting City: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete City. Please try again.');
        }
    }
}