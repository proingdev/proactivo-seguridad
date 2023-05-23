<?php

namespace App\Http\Controllers\AccessControl\Configuration;

use App\Http\Controllers\Controller;
use App\Models\AccessControl\Company;
use App\Models\AccessControl\Area;
use App\Models\AccessControl\JobTitle;
use App\Models\AccessControl\Location;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all companies
        $companies = Company::where('is_active', '=', true)
            ->get();

        //get all areas
        $areas = Area::where('is_active', '=', true)
            ->with('company')
            ->get();
        
        //get all Job Titles
        $jobTitles = JobTitle::where('is_active', '=', true)
            ->with('areas')
            ->with('company')
            ->get();
        
        //get all Job Titles
        $locations = Location::where('is_active', '=', true)
            ->with('company')
            ->get();
    
        //return to view
        return view('AccessControl.Configuration.index', [
            'companies' => $companies,
            'areas' => $areas,
            'jobTitles' => $jobTitles,
            'locations' => $locations,
        ]);
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
