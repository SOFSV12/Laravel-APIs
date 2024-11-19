<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Services\ApiResponseService;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all();
        return ApiResponseService::success($employee);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $employee = Employee::create($request->validated());
        return ApiResponseService::success($employee, "New employee created succesfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        try {
            $employee = Employee::findOrFail($id);
    
            $employee->update($request->validated());
    
            return ApiResponseService::success($employee, "Employee updated successfully.");
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return ApiResponseService::error($e->getMessage(), "Employee not found", 404);
        } catch (\Exception $e) {
            return ApiResponseService::error(null, "An error occurred while updating the Employee", 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        if($employee){
            $employee->delete();
            return ApiResponseService::success($employee, "Project Destroyed");
        }else{
            return ApiResponseService::error($employee, "project not found",404);
        }
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $employee = Employee::withTrashed()->find($id);
        if($employee){
            $employee->restore();
            return ApiResponseService::success($employee, "Project Restored");
        }else{
            return ApiResponseService::error($employee, "project not found",404);
        }
    }
}
