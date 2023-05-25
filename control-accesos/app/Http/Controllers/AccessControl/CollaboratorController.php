<?php

namespace App\Http\Controllers\AccessControl;

use App\Http\Controllers\Controller;
use App\Models\AccessControl\Area;
use App\Models\AccessControl\Collaborator;
use App\Models\AccessControl\Company;
use App\Models\AccessControl\IdentificationType;
use App\Models\AccessControl\JobTitle;
use App\Models\AccessControl\Location;
use Illuminate\Http\Request;

class CollaboratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('AccessControl.Collaborators.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Get all identifications types
        $identificationTypes = IdentificationType::where('is_active', '=', true)
        ->get();

        //Get all companies
        $companies = Company::where('is_active', '=', true)
        ->get();

        //Get all Áreas
        $areas = Area::where('is_active', '=', true)
        ->get();

        //Get all Cargos
        $jobTitles = JobTitle::where('is_active', '=', true)
        ->get();

        //Get all Locations
        $locations = Location::where('is_active', '=', true)
            ->get();

        return view('AccessControl.Collaborators.create', [
            'companies' => $companies,
            'areas' => $areas,
            'jobTitles' => $jobTitles,
            'locations' => $locations,
            'identificationTypes' => $identificationTypes,
        ]);
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
    public function show(Collaborator $collaborator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collaborator $collaborator)
    {
        //
        return view('AccessControl.Collaborators.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Collaborator $collaborator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collaborator $collaborator)
    {
        //
    }
}
