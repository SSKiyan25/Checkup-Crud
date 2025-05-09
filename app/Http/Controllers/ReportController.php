<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\City;
use App\Models\Brgy;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    // Helper function to get the list of barangays based on the selected city
    public function getBrgysByCity(Request $request)
    {
        $cityId = $request->input('city_id');

        if (!$cityId) {
            return response()->json([]);
        }

        $brgys = Brgy::where('city_id', $cityId)->get(['id', 'name']);
        return response()->json($brgys);
    }

    public function awareness(Request $request)
    {
        $cities = City::all();
        $brgys = Brgy::all();

        // Set 0 default values when the user accessed the page at the start
        $data = [
            'PUI' => 0,
            'PUM' => 0,
            'Positive on Covid' => 0,
            'Negative on Covid' => 0,
        ];

        // If the user selected a city or barangay, populate the data
        if ($request->city_id) {
            $query = Patient::query();

            // Filter by city if city_id is provided
            $query->whereHas('brgy', function ($q) use ($request) {
                $q->where('city_id', $request->city_id);
            });

            // Filter by barangay if brgy_id is provided
            if ($request->brgy_id) {
                $query->where('brgy_id', $request->brgy_id);
            }

            // Count the number of patients based on their case type
            $data = $query->get()->groupBy('case_type')->map->count();
        }

        return view('reports.awareness', compact('data', 'cities', 'brgys'));
    }

    public function coronavirus(Request $request)
    {
        $cities = City::all();
        $brgys = Brgy::all();

        // Set 0 default values when the user accessed the page at the start
        $data = [
            'PUI' => 0,
            'PUM' => 0,
            'Positive on Covid' => 0,
            'Negative on Covid' => 0,
        ];

        // If the user selected a city or barangay, populate the data
        if ($request->city_id) {
            $query = Patient::query();

            // Filter by city if city_id is provided
            $query->whereHas('brgy', function ($q) use ($request) {
                $q->where('city_id', $request->city_id);
            });

            // Filter by barangay if brgy_id is provided
            if ($request->brgy_id) {
                $query->where('brgy_id', $request->brgy_id);
            }

            // Count the number of patients based on their coronavirus status
            $data = $query->get()->groupBy('coronavirus_status')->map->count();
        }

        return view('reports.coronavirus', compact('data', 'cities', 'brgys'));
    }
}