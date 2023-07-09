<?php
   
namespace App\Http\Controllers\Api;
   
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use Validator;
use App\Models\Api\Professional;
use App\Http\Resources\Response as ProfessionalResponse;
   
class ProfessionalController extends BaseController
{
    public function index()
    {
        $professionals = Professional::all();
        return $this->sendResponse(ProfessionalResponse::collection($professionals), 'Professional fetched.');
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
        $professional = Professional::create($input);
        return $this->sendResponse(new ProfessionalResponse($professional), 'Professional created.');
    }
   
    public function show($id)
    {
        $professional = Professional::find($id);
        if (is_null($professional)) {
            return $this->sendError('Professional does not exist.');
        }
        return $this->sendResponse(new ProfessionalResponse($professional), 'Professional fetched.');
    }
    
    public function update(Request $request, Blog $professional)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $professional->title = $input['title'];
        $professional->description = $input['description'];
        $professional->save();
        
        return $this->sendResponse(new ProfessionalResponse($professional), 'Professional updated.');
    }
   
    public function destroy(Blog $professional)
    {
        $professional->delete();
        return $this->sendResponse([], 'Professional deleted.');
    }
}