<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProject;
use App\Services\ApiResponseService;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $info = [];
        $info['projects_and_employee']    = Project::with('employees:project_id,name,email')->get();
        $info['activeProjects']           = Project::where('status', true)->get();
        $info['inactiveProjects']         = Project::where('status', false)->get();
        $info['projectCount']             = count($info['projects_and_employee']);
        $info['activeCount']              = count($info['activeProjects']);
        $info['inactiveCount']            = count($info['inactiveProjects']);
        $info['employeeCount']            = count(Employee::all());

        if($request->filled('status')){

            if($request->status == '1'){
               $message  = "Active Projects"; 
            }else{
                $message = "Inactve Projects";
            }

            $projects = Project::where('status', $request->status)->get();
            return ApiResponseService::success($projects,$message);
        }
        if($request->filled('name')){
            $projects = Project::where('name', 'LIKE', '%' . $request->name . '%')->get();
            return ApiResponseService::success($projects);
        }
        return ApiResponseService::success($info);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProject $request)
    {
        $project = project::create($request->validated());
        return ApiResponseService::success($project, "New project created succesfully");
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
    public function update(UpdateProjectRequest $request, $id)
    {
        try {
            $project = Project::findOrFail($id);
    
            $project->update($request->validated());
    
            return ApiResponseService::success($project, "Project updated successfully.");
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return ApiResponseService::error($e->getMessage(), "Project not found", 404);
        } catch (\Exception $e) {
            return ApiResponseService::error(null, "An error occurred while updating the project", 500);
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
        $project = Project::find($id);
        if($project){
            $project->delete();
            return ApiResponseService::success($project, "Project Destroyed");
        }else{
            return ApiResponseService::error($project, "project not found",404);
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
        $project = Project::withTrashed()->find($id);
        if($project){
            $project->restore();
            return ApiResponseService::success($project, "Project Restored");
        }else{
            return ApiResponseService::error($project, "project not found",404);
        }
    }
}
