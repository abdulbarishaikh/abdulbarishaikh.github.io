<?php
   
namespace App\Http\Controllers\Api;
   
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use Validator;
use App\Models\Api\Project;
use App\Http\Resources\Response as ProjectResponse;
   
class ProjectController extends BaseController
{
    public function index()
    {
        $projects = Project::all();
        return $this->sendResponse(ProjectResponse::collection($projects), 'Project fetched.');
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $project = Project::create($input);
        return $this->sendResponse(new ProjectResponse($project), 'Project created.');
    }
   
    public function show($id)
    {
        $project = Project::find($id);
        if (is_null($project)) {
            return $this->sendError('Project does not exist.');
        }
        return $this->sendResponse(new ProjectResponse($project), 'Project fetched.');
    }
    
    public function update(Request $request, Blog $project)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $project->title = $input['title'];
        $project->description = $input['description'];
        $project->save();
        
        return $this->sendResponse(new ProjectResponse($project), 'Project updated.');
    }
   
    public function destroy(Blog $project)
    {
        $project->delete();
        return $this->sendResponse([], 'Project deleted.');
    }
}