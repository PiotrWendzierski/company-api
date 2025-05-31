<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest; //to validate to create and update employee
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    // all employyes
    public function index()
    {
        $employees = Employee::with('company')->get();
        return response()->json
        (
        [
            'message' => 'Employees list',
            'data' => $employees
        ], 200
        );
    }

    // create new employee with company
    public function store(StoreEmployeeRequest $request)
    {
            $employee = Employee::create($request->validated());
            return response()->json
            (
            [
                'message' => 'Employee added.',
                'data' => $employee
            ], 201
            );
    }

    // show single employee
    public function show(Employee $employee)
    {
        return response()->json
        (
        [
            'message' => 'Employye details',
            'data' => $employee->load('company')
        ], 200
        );
    }

    // update single employee
    public function update(StoreEmployeeRequest $request, Employee $employee)
    {
        try
        {
            $employee->update($request->validated());
            return response()->json
            (
            [
                'message' => 'Employee updated.',
                'data' => $employee
            ], 200
            );
        }
        catch (\Exception $e) 
        {
            //error log (storage/logs/laravel.log)
            Log::error('Emloyee not updated: ' . $e->getMessage());
            return response()->json
            (
            [
                'message' => 'Error while updating.',
                'error' => $e->getMessage()
            ], 500
            );
        }
    }

    //delete single employee
    public function destroy(Employee $employee)
    {
        try
        {
            $employee->delete();

            return response()->json
            (
            [
                'message' => 'Employee deleted successfully.'
            ], 200
            );
        }
        catch (\Exception $e) 
        {
            //error log (storage/logs/laravel.log)
            Log::error('Employee not deleted: ' . $e->getMessage());
            return response()->json
            (
            [
                'message' => 'Error while deleting employee.',
                'error' => $e->getMessage()
            ], 500
            );
        }
    }
}
