<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest; //to validate data while creating company
use App\Http\Requests\UpdateCompanyRequest; //to validate data while editing company
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class CompanyController extends Controller
{
    // get all companies (with employyes)
    public function index()
    {
        $companies = Company::with('employees')->get();

        return response()->json
        (
        [
            'message' => 'Companies List',
            'data' => $companies
        ], 200);
    }

    //create new company
    public function store(StoreCompanyRequest $request)
    {
        $company = Company::create($request->validated());
        return response()->json
        (
        [
            'message' => 'Comapany created.',
            'data' => $company
        ],201
        );
    }

    //show single company with employee
    public function show(Company $company)
    {
        return response()->json
        (
        [
            'message' => 'Company details',
            'data' => $company->load('employees')
        ], 200
        );
    }

    //update single company
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        try 
        {
            $company->update($request->validated());
            return response()->json
            (
            [
                'message' => 'Company updated.',
                'data' => $company
            ], 200
            );
        } 
        catch (\Exception $e) 
        {
            //error log (storage/logs/laravel.log)
            Log::error('Company not updated: ' . $e->getMessage());
            return response()->json
            (
            [
                'message' => 'Error while updating.',
                'error' => $e->getMessage()
            ], 500
            );
        }
    }

    //delete single company
    public function destroy(Company $company)
    {
        try 
        {
            $company->delete();

            return response()->json
            (
            [
                'message' => 'Company deleted successfully.'
            ], 200
            );
        } 
        catch (\Exception $e) 
        {
            //error log (storage/logs/laravel.log)
            Log::error('Company not deleted: ' . $e->getMessage());
            return response()->json
            (
            [
                'message' => 'Error while deleting company.',
                'error' => $e->getMessage()
            ], 500
            );
        }
    }
}
