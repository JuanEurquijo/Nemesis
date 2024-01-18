<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\PatientController;

Route::get('/', [DashboardController::class, 'index']);

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('/medicines', MedicineController::class);
    Route::resource('/prescription', PrescriptionController::class);
    Route::resource('/patients', PatientController::class);
    Route::get('/prescription/search/{identification}', [PrescriptionController::class, 'searchPatient'])->name('prescription.searchPatient');
    Route::get('/prescription/activeIngredient/{categoryId}', [PrescriptionController::class, 'searchActiveIngredient'])->name('prescription.searchActiveIngredient');
    Route::get('/prescription/pharmaceuticalForm/{activeIngredient}', [PrescriptionController::class, 'searchPharmaceuticalForm'])->name('prescription.searchPharmaceuticalForm');
    Route::get('/prescription/concentration/{activeIngredient}/{pharmaceuticalForm}', [PrescriptionController::class, 'searchConcentration'])->name('prescription.searchConcentration');
    Route::post('/prescription/medicine', [PrescriptionController::class, 'searchMedicine'])->name('prescription.searchMedicine');
    Route::post('/prescription/dosage', [PrescriptionController::class, 'searchDosage'])->name('prescription.searchDosage');
});

