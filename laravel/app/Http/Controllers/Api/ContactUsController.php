<?php
   
namespace App\Http\Controllers\Api;
   
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use Validator;
use App\Models\Api\ContactUs;
use App\Http\Resources\Response as ContactResponse;
   
class ContactUsController extends BaseController
{
    public function index()
    {
        $contactUs = ContactUs::all();
        return $this->sendResponse(ContactResponse::collection($contactUs), 'Contactus fetched.');
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name'=> 'required',
            'mobileNumber'=> 'required',
            'email'=> 'required|email',
            'subject'=> 'required',
            'message'=> 'required',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $contactUs = ContactUs::create($input);
        return $this->sendResponse([],'Contactus created.');
    }
   
    public function show($id)
    {
        $contactUs = ContactUs::find($id);
        if (is_null($contactUs)) {
            return $this->sendError('Contactus does not exist.');
        }
        return $this->sendResponse(new ContactResponse($contactUs), 'Contactus fetched.');
    }
    
    public function update(Request $request, Blog $contactUs)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $contactUs->title = $input['title'];
        $contactUs->description = $input['description'];
        $contactUs->save();
        
        return $this->sendResponse(new ContactResponse($contactUs), 'Contactus updated.');
    }
   
    public function destroy(Blog $contactUs)
    {
        $contactUs->delete();
        return $this->sendResponse([], 'Contactus deleted.');
    }
}