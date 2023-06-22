<?php

namespace App\Http\Controllers\AccessControl;

use App\Http\Controllers\Controller;
use App\Models\AccessControl\Area;
use App\Models\AccessControl\Collaborator;
use App\Models\AccessControl\Company;
use App\Models\AccessControl\IdentificationType;
use App\Models\AccessControl\JobTitle;
use App\Models\AccessControl\Location;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

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
        // Receive data from form
        $data = $request->all();
        dd($data);

        $imagePath = "/images/default.png";

        // Create a new user password
        $password = User::generatePassword(6);

        //Get the username from email
        $username = explode("@", $data['email']);

        // Create a user with request info
        $userCreated = User::create([
            'username' => $username,
            'identification' => $data['identification'],
            'identification_type' => $data['identification_type'],
            'photo_path' => $imagePath,
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'role_id' => 2, // TODO: Change this when roles will defined on DB
            'created_by' => auth()->user()->id,
            'password' => $password,
        ]);

        // if the user was created
        if($userCreated){
            // Create collaborator
            $collaboratorCreated = Collaborator::create([
                'user_id' => $userCreated->id,
                'company_id' => $data['company_id'],
                'area_id' => $data['area_id'],
                'job_title_id' => $data['job_title_id'],
                'location_id' => $data['location_id'], 
            ]);

            if( $collaboratorCreated ){

                // Verify if the form send image
                if( $data['photoDataInput'] != null ){
                    
                    $imageData = str_replace('data:image/png;base64,', '', $data['photoDataInput']);
                    $imageData = str_replace(' ', '+', $imageData);
                    $image = base64_decode($imageData);

                    $fileName = uniqid() . '.png';
                }
                
                // Save the user collaborator image
                $filePath = 'collaborators/images/' . $fileName;
                Storage::disk('public')->put($filePath, $image);

                $userCreated->photo_path = $filePath;
                $userCreated->save();

                //TODO: Enviar contraseña por correo.
            }
        }

        
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
