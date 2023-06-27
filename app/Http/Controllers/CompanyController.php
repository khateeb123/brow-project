<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::latest()->get();

        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        DB::beginTransaction();
        try {
            //code...
            $validatedData = $request->validated();
            
            $path = Storage::disk('company')->put('logo', $request->logo);
            
            $validatedData['logo'] = $path;
            
           $company = Company::create($validatedData);
            
            
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error','internal server error');
            
        }
        
        DB::commit();
        Mail::to($company->email)->send(new WelcomeEmail());
        return redirect()->route('companies.index')->with('success','created successfully');




    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $validatedData = $request->validated();

        if ($request->logo) {

            $path = Storage::disk('company')->put('logo', $request->logo);

            $validatedData['logo'] = $path;
           
        }else {

            unset($validatedData['logo']);
        }
        
        
        $company->update($validatedData);


        return redirect()->route('companies.index')->with('success','created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')->with('success','deleted successfully.');
    }
}
