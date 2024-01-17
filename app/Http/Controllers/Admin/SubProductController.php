<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubProducts;
use App\Models\Products;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\File;
use App\Models\AddOns;




class SubProductController extends Controller
{
    public function index(Request $request)
    {

        $products = array();
        $subproducts = array();


        if (!$request->isMethod('post')) {

            $products =  Products::select('id', 'product_name')->where('status','=',1)->get()->toArray();

            return view('admin.sub-products.subproduct')->with(compact('products'));
        }

        if ($request->ajax() && $request->isMethod('post')) {

            $subproducts =  SubProducts::select('sub_products.*', 'products.product_name')
                ->leftJoin('products', 'sub_products.product_id', '=', 'products.id')
                ->where('products.status','=',1)
                ->orWhere('sub_products.status', '=',1)->get();

                return Datatables::of($subproducts)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    // $action = '<button class="" data-id="' . $row['id'] . '" id="subproductEdit">Edit</button>';
                    // $action .= '<button class="" data-id="' . $row['id'] . '" id="subproductDelete">Delete</button>';
                    // return $action;
                    $action =  '<div class="dropdown">';
                    $action .='<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>';
                    $action .= '<div class="dropdown-menu">';
                    $action .= '<a class="dropdown-item" href="'.route('subproducts.details', ['id' => $row['id']]).'" data-id="' . $row['id'] . '" id="subproductDescription"><i class="bx bx-text"></i> Details</a>';
                    $action .= '<a class="dropdown-item" href="'.route('subproducts.addon', ['id' => $row['id']]).'" data-id="' . $row['id'] . '" id="subproductAddon"><i class="bx bx-message-alt-add" ></i> Add-Ons</a>';
                    $action .= '<a class="dropdown-item" href="javascript:void(0);" data-id="' . $row['id'] . '" id="subproductEdit"><i class="bx bx-edit-alt me-1"></i> Edit</a>';
                    $action .='<a class="dropdown-item" href="javascript:void(0);" data-id="' . $row['id'] . '" id="subproductDelete"><i class="bx bx-trash me-1"></i> Delete</a>
                    </div>
                  </div>';
                    
                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    

    public function subProductSave(Request $request)
    {

        $post = $request->post();

        $validation = Validator::make($request->all(), [
            'subproductname'                  => 'required',
            'productid'                  => 'required',
        ]);

        if ($validation->fails()) {
            $data['status'] = 0;
            $data['error'] = $validation->errors()->all();
            echo json_encode($data);
            exit();
        }

        $response = array();
        $response['status'] = 0;
        $response['msg'] = "Something went wrong please try again.";

        if (empty($post['hid']) && $post['hid'] == '') {

            $insertSubProduct = new SubProducts;
            $insertSubProduct->subproduct_name = isset($post['subproductname']) ? $post['subproductname'] : '';
            $insertSubProduct->product_id = isset($post['productid']) ? $post['productid'] : '';
            $insertSubProduct->status = 1;
            $insertSubProduct->created_at = Carbon::now();
            $insertSubProduct->save();

            if ($insertSubProduct->id) {
                $response['status'] = 1;
                $response['msg'] = "Sub Product Saved Successfully.";
            }
        } else {

            $updateSubProduct = SubProducts::where('id', $post['hid'])->first();
            $updateSubProduct->subproduct_name = isset($post['subproductname']) ? $post['subproductname'] : '';
            $updateSubProduct->product_id = isset($post['productid']) ? $post['productid'] : '';
            $updateSubProduct->status = 1;
            $updateSubProduct->updated_at = Carbon::now();
            $updateSubProduct->save();

            if ($updateSubProduct->id) {
                $response['status'] = 1;
                $response['msg'] = "Sub Product Updated Successfully.";
            }
        }

        echo json_encode($response);
        exit();
    }

    public function subProductEdit(Request $request)
    {

        $post = $request->all();

        $response = array();
        $response['status'] = 0;
        $response['msg'] = "Something went wrong please try again.";

        if (isset($post['id'])) {

            $subproductUpdate = SubProducts::where('id', $post['id'])->get()->first();

            if (!empty($subproductUpdate)) {
                $response['status'] = 1;
                $response['msg'] = "Sub-Product Edit Successfully.";
                $response['data'] = $subproductUpdate;
            }
        }

        echo json_encode($response);
        exit();
    }
    public function subProductDelete(Request $request){

        $post = $request->all();

        $response = array();
        $response['status'] = 0;
        $response['msg'] = "Something went wrong please try again.";

        if(isset($post['id'])){

        $subproductsRemove = SubProducts::where('id',$post['id'])->get()->first();
        $subproductsRemove->status = 0;
        $subproductsRemove->save();

            if($subproductsRemove){
                $response['status'] = 1;
                $response['msg'] = "Sub Products Removed Successfully.";
            }
        }
        echo json_encode($response);
        exit();
    }

    public function description(){
        // return view('');
    }

    public function addOn(Request $request){
        if (!$request->isMethod('post')) {

        return view('admin.sub-products.add-ons');
    }

    if ($request->ajax() && $request->isMethod('post')) {

        $addOns =  AddOns::select('addons.*','sub_products.subproduct_name')
        ->leftJoin('sub_products', 'addons.subproduct_id', '=', 'sub_products.id')
        ->where('addons.status','=',1)->get();
       

        return Datatables::of($addOns)
        ->addIndexColumn()
        ->addColumn('img', function ($row) {
            $img = '';
            $img = '<img src="' . asset('uploads/' . $row['addon_img']) . '" alt="Not Found!" style="max-height: 50px;">';
            return $img;
        })
        ->addColumn('action', function ($row) {
            // $action = '<button class="" data-id="' . $row['id'] . '" id="subproductEdit">Edit</button>';
            // $action .= '<button class="" data-id="' . $row['id'] . '" id="subproductDelete">Delete</button>';
            // return $action;
            $action =  '<div class="dropdown">';
            $action .='<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
              <i class="bx bx-dots-vertical-rounded"></i>
            </button>';
            $action .= '<div class="dropdown-menu">';
            $action .= '<a class="dropdown-item" href="javascript:void(0);" data-id="' . $row['id'] . '" id="editAddOn"><i class="bx bx-edit-alt me-1"></i> Edit</a>';
            $action .='<a class="dropdown-item" href="javascript:void(0);" data-id="' . $row['id'] . '" id="deleteAddOn"><i class="bx bx-trash me-1"></i> Delete</a>
            </div>
          </div>';
            
            return $action;
        })
        ->rawColumns(['img','action'])
        ->make(true);
    }
    }

    public function addOnSave(Request $request){
        $post = $request->all();

        $currentURL = url()->previous();
        $subproductId = basename($currentURL);

        $response = array();
        $response['status'] = 0;
        $response['msg'] = "Something went wrong please try again.";

        $imageName = '';

        if (!isset($post['hid']) && $post['hid'] == '') {

            if ($request->hasFile('addonImg')) {

                $extension = $request->file('addonImg')->getClientOriginalExtension();
                $imageName = time() . '.' . $extension;

                $uploadDirectory = 'uploads';

                $uploadPath = public_path($uploadDirectory);

                if (!File::exists($uploadPath)) {
                    File::makeDirectory($uploadPath, 0777, true, true);
                }

                $request->file('addonImg')->move($uploadPath, $imageName);
                $imagePath = $uploadDirectory . '/' . $imageName;
            }

            $insertaddOnDetails = new AddOns;
            $insertaddOnDetails->title = isset($post['addontitle']) ? $post['addontitle'] : '';
            $insertaddOnDetails->addon_img = isset($imageName) ? $imageName : '';
            $insertaddOnDetails->addon_description = isset($post['addOndescription']) ? $post['addOndescription'] : '';
            $insertaddOnDetails->subproduct_id  = isset($subproductId) ? $subproductId : '';
            $insertaddOnDetails->category  = isset($post['category']) ? $post['category'] : '';
            $insertaddOnDetails->status  = 1;
            $insertaddOnDetails->created_at = Carbon::now();
            $insertaddOnDetails->save();

            if ($insertaddOnDetails->id) {
                $response['status'] = 1;
                $response['msg'] = "Add-Ons Details Saved Successfully.";
            }
        }else {

         
            $updateAddonDetails = AddOns::where('id', $post['hid'])->first();
            $updateAddonDetails->title  = isset($post['addontitle']) ? $post['addontitle'] : '';

            if($request->hasFile('addonImg')){
   
                $oldImagePath = public_path('uploads/' . $post['imgHid']);
               
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
                    $extension = $request->file('addonImg')->getClientOriginalExtension();
                    $updateimageName = time() . '.' . $extension;
                    $uploadDirectory = 'uploads';
                    $uploadPath = public_path($uploadDirectory);
            
                    $request->file('addonImg')->move($uploadPath, $updateimageName);
            
                    $updateAddonDetails->addon_img = isset($updateimageName) ? $updateimageName : '';

                 
            }
            
            $updateAddonDetails->addon_description = isset($post['addOndescription']) ? $post['addOndescription'] : '';
            $updateAddonDetails->category =  isset($post['category']) ? $post['category'] : '';
            $updateAddonDetails->subproduct_id = isset($subproductId) ? $subproductId : '';
            $updateAddonDetails->status = 1;
            $updateAddonDetails->updated_at = Carbon::now();

            $updateAddonDetails->save();

            if ($updateAddonDetails->id) {
                $response['status'] = 1;
                $response['msg'] = "Add-On Updated Successfully.";
            }
        }
        
        echo json_encode($response);
        exit();
    }

    public function addOnEdit(Request $request){

        $post = $request->all();


        $response = array();
        $response['status'] = 0;
        $response['msg'] = "Something went wrong please try again.";

        if (isset($post['id'])) {

            $addonEdit = AddOns::where('id', $post['id'])->get()->first();

            if (!empty($addonEdit)) {
                $response['status'] = 1;
                $response['msg'] = "Add-On Edit Successfully.";
                $response['data'] = $addonEdit;
            }
        }

        echo json_encode($response);
        exit();
    }

    public function addOnDelete(Request $request){

        $post = $request->all();

        $response = array();
        $response['status'] = 0;
        $response['msg'] = "Something went wrong please try again.";

        if(isset($post['id'])){

        $subproductsRemove = AddOns::where('id',$post['id'])->get()->first();
        $subproductsRemove->status = 0;
        $subproductsRemove->save();

            if($subproductsRemove){
                $response['status'] = 1;
                $response['msg'] = "AddOns Removed Successfully.";
            }
        }
        echo json_encode($response);
        exit();
    }

    public function subProductDetail($id = null, Request $request)
    {
        echo '<pre>';
        print_r($id);
        die;
    }

}
