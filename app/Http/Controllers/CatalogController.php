<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $standards = Catalog::paginate(10);
        return inertia('Catalog/Index', ['standards' => $standards]);
    }

    public function search(string $query)
    {
        $standardsQuery = Catalog::query();

        if ($query) {
            $standardsQuery->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('atc', 'like', "%$query%")
                    ->orWhere('principio_activo', 'like', "%$query%")
                    ->orWhere('forma_farmaceutica', 'like', "%$query%")
                    ->orWhere('concentracion', 'like', "%$query%");
            });
        }

        $standards = $standardsQuery->paginate(10);
        return response()->json(['standards' => $standards]);
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
