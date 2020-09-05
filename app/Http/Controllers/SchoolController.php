<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportSchoolsData;
use App\Http\Requests\StoreSchoolData;
use App\Imports\SchoolsImport;
use App\School;
use App\User;
use App\View\Components\SchoolForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\HeadingRowImport;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('school.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('school.create');
    }

    /**
     * Import school data from excel file
     *
     * @param ImportSchoolsData $request 
     * @return \Illuminate\Http\Response
    
     **/
    public function import(ImportSchoolsData $request)
    {
        $excelHeading = [
            'head_first_name',
            'head_last_name',
            'main_email',
            'urn',
            'school_name',
            'school_type',
            'phone_number',
            'fax_number',
            'post_code',
            'street',
            'locality',
            'town',
            'address_3',
            'school_website'
        ];

        $headings = (new HeadingRowImport())->toArray($request->import)[0][0];
        
        if (array_diff($excelHeading, $headings)) {
            return back()->withErrors('The specified Excel doesn\'t consist required columns.');
        }

        $extension = $request->import->extension();
        $fileName = "data-import-" . time() . "." . $extension;
        $file = $request->import->storeAs('imports', $fileName);
        
        $import = new SchoolsImport;
        $import->import($file);
        
        // if ($import->failures()->isNotEmpty()) {
        //     session()->flash('failures', $import->failures());
        // }

        if (count($import->skippedRows)) {
            session()->flash('failures', $import->skippedRows);
        }

        return back()->with('success', 'School data imported successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSchoolData $request)
    {
        // Retrieve the validated input data...
        // $validated = $request->validated();
        
        try {
            if ($request->hasFile('image')) {
                $extension = $request->image->extension();
                $fileName = implode('-', explode(' ', $request->name));
                $fileName = $request->name . "-logo." . $extension;
                $path = $request->image->storeAs('/school-logos', $fileName);
                
                $request->request->add(['logo' => $path]);
            }
    
            if ($request->longitude && $request->latitude) {
                $request->request->add(['long_lat' => json_encode([
                    'long'  => floatval($request->longitude),
                    'lat'   => floatval($request->latitude)
                ])]);
            }

            DB::beginTransaction();
            $user = User::create([
                'name' => $request->principalName,
                'email' => $request->email,
                'password' => Hash::make('password' . $request->urn)
            ]);
    
            $request->request->remove('principalName');
            $request->request->remove('email');
            $request->request->remove('longitude');
            $request->request->remove('latitude');
    
            $user->school()->create($request->except('image'));
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            
            if (Storage::exists($request->logo)) {
                Storage::delete($request->logo);
            }
            return back()->withErrors('Something wrong went with the Operation.')->withInput();
        }

        return back()->with('success', 'School Data Registered Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        //
    }
}
