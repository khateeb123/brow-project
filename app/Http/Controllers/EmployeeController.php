<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Company;

class EmployeeController extends Controller

{
  
    public function index(Company $company)
    {
        $employees = $company->employees()->latest()->get();

        return view('employee.index', compact('company', 'employees'));
    }

  
    



    public function create(Company $company)
    {
        return view('employee.create', compact('company'));
    }

   


    
    public function store(StoreEmployeeRequest $request, Company $company)
    {
        $validatedData = $request->validated();
    
        $employee = new Employee($validatedData);
    
        $company->employees()->save($employee);
    
        return redirect()->route('companies.employees.index', $company)
            ->with('success', 'Employee created successfully.');
    }

   
    



    public function show(Company $company, Employee $employee)
    {


        return view('employees.show', compact('company', 'employee'));
    }

  
    


    public function edit(Company $company, Employee $employee)
    {


        return view('employee.edit', compact('company', 'employee'));
    }

  
    



    public function update(UpdateEmployeeRequest $request, Company $company, Employee $employee)
    {

    
        $validatedData = $request->validated();
    
        $employee->update($validatedData);
    
        return redirect()->route('companies.employees.show', [$company, $employee])
            ->with('success', 'Employee updated successfully.');
    }

  
    



    public function destroy(Company $company, Employee $employee)
    {
    

        $employee->delete();

        return redirect()->route('companies.employees.index', $company)
            ->with('success', 'Employee deleted successfully.');
    }
}
