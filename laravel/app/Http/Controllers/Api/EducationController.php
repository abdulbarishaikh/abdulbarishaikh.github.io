<?php
   
namespace App\Http\Controllers\Api;
   
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use Validator;
use App\Models\Api\Education;
use App\Http\Resources\Response as EducationResponse;
   
class EducationController extends BaseController
{
    public function index()
    {
        $educations = Education::all();
        return $this->sendResponse(EducationResponse::collection($educations), 'Education fetched.');
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
        $education = Education::create($input);
        return $this->sendResponse(new EducationResponse($education), 'Education created.');
    }
   
    public function show($id)
    {
        $education = Education::find($id);
        if (is_null($education)) {
            return $this->sendError('Education does not exist.');
        }
        return $this->sendResponse(new EducationResponse($education), 'Education fetched.');
    }
    
    public function update(Request $request, Blog $education)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $education->title = $input['title'];
        $education->description = $input['description'];
        $education->save();
        
        return $this->sendResponse(new EducationResponse($education), 'Education updated.');
    }
   
    public function destroy(Blog $education)
    {
        $education->delete();
        return $this->sendResponse([], 'Education deleted.');
    }
}