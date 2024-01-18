<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\PharmaceuticalForm;
use App\Models\Category;
use App\Models\Dosage;
use Inertia\Response;
use App\Http\Requests\MedicineRequest;
use Illuminate\Support\Facades\Auth;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        
        $medicines = Medicine::with('category')
        ->where('user_id', $userId)
        ->paginate(10);
        return inertia('Medicines/Index', ['medicines' => $medicines]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $presentations = PharmaceuticalForm::all();
        $categories = Category::whereNotIn('id', function ($query) {
            $query->select('child_id')
                  ->from('category_relations')
                  ->whereNotNull('parent_id');
        })
        ->get();
        return inertia('Medicines/Create',['presentations' => $presentations,
                                           'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MedicineRequest $request)
    {
    
        $userId = Auth::id();
        $validatedData = $request->validated();
        $validatedData['user_id'] = $userId;
        $medicine = Medicine::create($validatedData);
        foreach ($request->dosages as $dosageData) {
            $dosage = new Dosage([
                'type' => $dosageData['type'],
                'average_dose' => $dosageData['average_dose'],
                'minimum_dose' => $dosageData['minimum_dose'],
                'maximum_dose' => $dosageData['maximum_dose'],
                'unique_dose' => $dosageData['unique_dose'],
            ]);
    
            $medicine->dosages()->save($dosage);
        }

        return redirect()->route('medicines.index');

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
    public function edit(Medicine $medicine)
    {
       $medicine->load('dosages');
       $presentations = PharmaceuticalForm::all();
       $categories = Category::whereNotIn('id', function ($query) {
        $query->select('child_id')
              ->from('category_relations')
              ->whereNotNull('parent_id');
    })
    ->get();
       return Inertia('Medicines/Edit', ['medicine' => $medicine, 
       'presentations' => $presentations,
       'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MedicineRequest $request, Medicine $medicine)
    {
        $medicine->update($request->validated());
        foreach ($request->dosages as $dosageData) {
            $dosage = Dosage::updateOrCreate(
                ['medicine_id' => $medicine->id, 'type' => $dosageData['type']],
                [
                    'unique_dose' => $dosageData['unique_dose'],
                    'maximum_dose' => $dosageData['maximum_dose'],
                    'minimum_dose' => $dosageData['minimum_dose'],
                    'average_dose' => $dosageData['average_dose'],
                ]
            );
        }
        return redirect()->route('medicines.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicine $medicine)
    {
        $medicine->dosages()->delete();
        $medicine->delete();
        return redirect()->route('medicines.index');
    }
}
