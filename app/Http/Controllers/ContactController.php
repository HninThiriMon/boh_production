<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use DataTables;
use Mail;

class ContactController extends Controller
{
    // space that we can use the repository from
   protected $model;

   public function __construct(Contact $contact)
   {
       // set the model
       $this->model = new Repository($contact);
   }

   public function index()
   {
    if ($request->ajax()) {
        $data = Contact::latest()->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                       $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-tuse Illuminate\Support\Facades\Mail;itle="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

                       $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
    return view('contacts.index',compact('contacts'));
    //    return $this->model->all();
   }

   public function store(Request $request)
   {
        $this->validate($request, [
           'full_name' => 'required|max:500',
           'email' => 'required|email|max:500',
           'solution' => 'required|max:500',
           'company_name' => 'required|max:500',
           'city' => 'required|max:500',
           'message' => 'required',
           'ph_no' => 'required|max:500'
       ]);

       $full_name = $request->full_name;
       $email = $request->email;
       $solution = $request->solution;
       $company_name = $request->company_name;
       $city = $request->city;
       $msg = $request->message;
       $ph_no = $request->ph_no;
       
      
        $body = array(
            "email" => $email,
            "solution" => $solution,
            "company_name" => $company_name,
            "city"=> $city,
            "msg"=> $msg,
            "ph_no"=> $ph_no,
        );
       
       $to_name = "BOH Team";
       $to_email = "tto@boh.com.mm";
       $data = array("name"=>$full_name,"body"=>$body);
       Mail::send('mail',$data,function($message) use ($to_name,$to_email){
        $message->to($to_email)
        ->subject('Contact Letter to Team BOH');
        });
        return 'success';
       
    // return response()->json(['success'=>'Contact Send BOH successfully.']);
      
   }

   public function show($id)
   {
       return $this->model->show($id);
   }

   public function update(Request $request, $id)
   {
       // update model and only pass in the fillable fields
       $this->model->update($request->only($this->model->getModel()->fillable), $id);

       return $this->model->find($id);
   }

   public function destroy($id)
   {
       return $this->model->delete($id);
   }
}