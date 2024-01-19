<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactCms;
use App\Models\AboutCms;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;


class CmsController extends Controller
{
    public function about(Request $request)
    {
        return view('admin.common.about');
    }
    public function contact(Request $request)
    {
        $contactCms = array();
        $contactCms = ContactCms::select('*')->first();
     
        return view('admin.common.contact')->with(compact('contactCms'));
    }

    public function contactSave(Request $request)
    {
        $post = $request->all();

        $response = array();
        $response['status'] = 0;
        $response['msg'] = "Something went wrong please try again.";


        $validation = Validator::make($request->all(), [
            'address'                  => 'required',
            'phone'                  => 'required',
            'email'             => 'required',
            'website'             => 'required',
        ]);

        if ($validation->fails()) {
            $data['status'] = 0;
            $data['error'] = $validation->errors()->all();
            echo json_encode($data);
            exit();
        }

        $contactCms = ContactCms::select('*')->first();
        
        if (!empty($contactCms)) {
            $insertContact = ContactCms::find($contactCms->id);
        } else {
            $insertContact = new ContactCms;
        }

        $insertContact->address = isset($post['address']) ? $post['address'] : '';
        $insertContact->phone = isset($post['phone']) ? $post['phone'] : '';
        $insertContact->email = isset($post['email']) ? $post['email'] : '';
        $insertContact->website = isset($post['website']) ? $post['website'] : '';
        $insertContact->created_at = Carbon::now();
        $insertContact->save();


        if ($insertContact->id) {
            $response['status'] = 1;
            $response['msg'] = "Contact Cms Saved Successfully.";
        }

        echo json_encode($response);
        exit();
    }

    public function saveAbout(Request $request)
    {
        $post = $request->all();

        $response = array();
        $response['status'] = 0;
        $response['msg'] = "Something went wrong please try again.";

        
        $validation = Validator::make($request->all(), [
            'title'                  => 'required',
            'subtitle'                  => 'required',
            'description'                  => 'required',
        ]);

        if ($validation->fails()) {
            $data['status'] = 0;
            $data['error'] = $validation->errors()->all();
            echo json_encode($data);
            exit();
        }
      
        $imageName = '';


            if ($request->hasFile('Img')) {

                $extension = $request->file('Img')->getClientOriginalExtension();
                $imageName = time() . '.' . $extension;

                $uploadDirectory = 'uploads';

                $uploadPath = public_path($uploadDirectory);

                if (!File::exists($uploadPath)) {
                    File::makeDirectory($uploadPath, 0777, true, true);
                }

                $request->file('Img')->move($uploadPath, $imageName);
                $imagePath = $uploadDirectory . '/' . $imageName;
            }

            $contactCms = AboutCms::select('*')->first();
        
            if (!empty($contactCms)) {
                $insertAboutDetails = AboutCms::find($contactCms->id);
            } else {
                $insertAboutDetails = new AboutCms;
            }

            $insertAboutDetails->title = isset($post['title']) ? $post['title'] : '';
            $insertAboutDetails->sub_title = isset($post['subtitle']) ? $post['subtitle'] : '';
            $insertAboutDetails->img = isset($imageName) ? $imageName : '';
            $insertAboutDetails->description = isset($post['description']) ? $post['description'] : '';
            $insertAboutDetails->created_at = Carbon::now();
            $insertAboutDetails->save();

            if ($insertAboutDetails->id) {
                $response['status'] = 1;
                $response['msg'] = "Details Saved Successfully.";
            }
            
        echo json_encode($response);
        exit();
    }
}
