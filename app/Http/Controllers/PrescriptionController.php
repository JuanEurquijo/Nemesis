<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Category;
use App\Models\Medicine;
use App\Models\Dosage;
use Illuminate\Support\Facades\Auth;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $categories = Category::whereNotIn('id', function ($query) {
            $query->select('child_id')
                  ->from('category_relations')
                  ->whereNotNull('parent_id');
        })
        ->get();
        return inertia('Prescription/Index',['user' =>$user,'categories' => $categories]);
    }

    /**
     * Search a patient with identification.
     */
    public function searchPatient(string $identification)
    {
        $patient = Patient::where('identification', $identification)->first();
        return response()->json(['patient'=>$patient]);
    }

     /**
     * Search active ingredient with category_id.
     */
    public function searchActiveIngredient(string $categoryId)
    {
        $activeIngredients = Medicine::where('category_id', $categoryId)
        ->pluck('active_ingredient')
        ->toArray();
        $uniqueActiveIngredients = array_unique($activeIngredients);
        return response()->json(['activeIngredients' => $uniqueActiveIngredients]);
    }

      /**
     * Search pharmaceutical form with active ingredient.
     */
    public function searchPharmaceuticalForm(string $activeIngredient)
    {
        $pharmaceuticalForms = Medicine::where('active_ingredient', $activeIngredient)
        ->pluck('pharmaceutical_form')
        ->toArray();
        $uniquePharmaceuticalForms = array_unique($pharmaceuticalForms);
        return response()->json(['pharmaceuticalForms' => $uniquePharmaceuticalForms]);
    }

      /**
     * Search concentration with pharmaceutical form.
     */
    public function searchConcentration(string $activeIngredient,string $pharmaceuticalForm)
    {
        $concentrations = Medicine::where('active_ingredient', $activeIngredient)
        ->where('pharmaceutical_form', $pharmaceuticalForm)
        ->pluck('concentration')
        ->toArray();
        return response()->json(['concentrations' => $concentrations]);
    }


     /**
     * Search dosage with medicine information
     */
    public function searchMedicine(Request $request)
    {
        $data = $request->all();

        $medicine = Medicine::where('active_ingredient', $data['active_ingredient'])
            ->where('pharmaceutical_form', $data['pharmaceutical_form'])
            ->where('concentration', $data['concentration'])
            ->first();

        if ($medicine) {
            return response()->json(['medicine' => $medicine]);
        } else {
            return response()->json(['error' => 'Medicine not found'], 404);
        }
    }

    public function searchDosage(Request $request)
    {
        $data = $request->all();

        $dosage = Dosage::where('medicine_id', $data['medicine_id'])
            ->where('type', $data['type_dose'])
            ->first();

        if ($dosage) {
        $dosageColumn = $data['dosage'];
        if (isset($dosage->$dosageColumn)) {
            $doseValue = $dosage->{$data['dosage']};
            return response()->json(['dosage' => $doseValue]);
        } else {
            return response()->json(['error' => 'Dosage value not found'], 400);
        }
    } else {
        return response()->json(['error' => 'Dosage not found for the specified type'], 404);
    }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
