<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductDescription;
use App\Models\ProductDetails;
use App\Models\Products;
use App\Models\ProductTechnology;
use App\Models\TechnologySubDetails;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\File;




class ProductController extends Controller
{
    public function index(Request $request)
    {

        if (!$request->isMethod('post')) {

            return view('admin.products.products');
        }
        if ($request->ajax() && $request->isMethod('post')) {

            $products =  Products::select('id', 'product_name')->where('status', '=', 1)->get();

            return Datatables::of($products)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    // $action = '<button class="" data-id="' . $row['id'] . '" id="productEdit">Edit</button>';
                    // $action .= '<button class="" data-id="' . $row['id'] . '" id="productDelete">Delete</button>';
                    // return $action;

                    $action =  '<div class="dropdown">';
                    $action .= '<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>';
                    $action .= '<div class="dropdown-menu">';
                    $action .= '<a class="dropdown-item" href="' . route('products.details', ['id' => $row['id']]) . '" data-id="' . $row['id'] . '" id="subproductDescription"><i class="bx bx-text"></i> Product Details</a>';
                    $action .= '<a class="dropdown-item" href="javascript:void(0);" data-id="' . $row['id'] . '" id="productEdit"><i class="bx bx-edit-alt me-1"></i> Edit</a>';
                    $action .= '<a class="dropdown-item" href="javascript:void(0);" data-id="' . $row['id'] . '" id="productDelete"><i class="bx bx-trash me-1"></i> Delete</a>
                    </div>
                  </div>';

                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function productSave(Request $request)
    {

        $post = $request->post();



        $validation = Validator::make($request->all(), [
            'productname'                  => 'required',
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

            $insertProduct = new Products;
            $insertProduct->product_name = isset($post['productname']) ? $post['productname'] : '';
            $insertProduct->status = 1;
            $insertProduct->created_at = Carbon::now();
            $insertProduct->save();

            if ($insertProduct->id) {
                $response['status'] = 1;
                $response['msg'] = "Product Saved Successfully.";
            }
        } else {
            $updateProduct = Products::where('id', $post['hid'])->first();
            $updateProduct->product_name = isset($post['productname']) ? $post['productname'] : '';
            $updateProduct->status = 1;
            $updateProduct->updated_at = Carbon::now();
            $updateProduct->save();

            if ($updateProduct->id) {
                $response['status'] = 1;
                $response['msg'] = "Product Updated Successfully.";
            }
        }

        echo json_encode($response);
        exit();
    }

    public function productEdit(Request $request)
    {

        $post = $request->all();

        $response = array();
        $response['status'] = 0;
        $response['msg'] = "Something went wrong please try again.";

        if (isset($post['id'])) {

            $productUpdate = Products::where('id', $post['id'])->get()->first();

            if (!empty($productUpdate)) {
                $response['status'] = 1;
                $response['msg'] = "Product Edit Successfully.";
                $response['data'] = $productUpdate;
            }
        }

        echo json_encode($response);
        exit();
    }
    public function productDelete(Request $request)
    {

        $post = $request->all();

        $response = array();
        $response['status'] = 0;
        $response['msg'] = "Something went wrong please try again.";

        if (isset($post['id'])) {
            $productsRemove = Products::where('id', $post['id'])->get()->first();
            $productsRemove->status = 0;
            $productsRemove->save();

            if ($productsRemove) {
                $response['status'] = 1;
                $response['msg'] = "Product Removed Successfully.";
            }
        }

        echo json_encode($response);
        exit();
    }

    public function productDetail($id = null, Request $request)
    {

        if (!$request->isMethod('post')) {

            // return view('admin.products.product-details');
            return view('admin.products.tab-view');
        }

        if ($request->ajax() && $request->isMethod('post')) {

            $productDetails =  ProductDetails::select('id', 'title', 'sub_title', 'banner_img', 'banner_description', 'product_id')->get();

            return Datatables::of($productDetails)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    // $action = '<button class="" data-id="' . $row['id'] . '" id="productEdit">Edit</button>';
                    // $action .= '<button class="" data-id="' . $row['id'] . '" id="productDelete">Delete</button>';
                    // return $action;

                    $action =  '<div class="dropdown">';
                    $action .= '<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>';
                    $action .= '<div class="dropdown-menu">';
                    // $action .= '<a class="dropdown-item" href="'.route('products.details', ['id' => $row['id']]).'" data-id="' . $row['id'] . '" id="subproductDescription"><i class="bx bx-text"></i> Product Details</a>';
                    $action .= '<a class="dropdown-item" href="javascript:void(0);" data-id="' . $row['id'] . '" id="productDetailsEdit"><i class="bx bx-edit-alt me-1"></i> Edit</a>';
                    $action .= '<a class="dropdown-item" href="javascript:void(0);" data-id="' . $row['id'] . '" id="productDetailsDelete"><i class="bx bx-trash me-1"></i> Delete</a>
                    </div>
                  </div>';

                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function productDetailSave(Request $request)
    {

        $post = $request->all();

        $currentURL = url()->previous();
        $productId = basename($currentURL);
        // $produc = decrypt($urlId);

        $validation = Validator::make($request->all(), [
            'title'                  => 'required',
            'subTitle'                  => 'required',
            'banneDescription'             => 'required',
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

        $imageName = '';

        if (!isset($post['hid']) && $post['hid'] == '') {

            if ($request->hasFile('bannerImg')) {

                $extension = $request->file('bannerImg')->getClientOriginalExtension();
                $imageName = time() . '.' . $extension;

                $uploadDirectory = 'uploads';

                $uploadPath = public_path($uploadDirectory);

                if (!File::exists($uploadPath)) {
                    File::makeDirectory($uploadPath, 0777, true, true);
                }

                $request->file('bannerImg')->move($uploadPath, $imageName);
                $imagePath = $uploadDirectory . '/' . $imageName;
            }

            $insertProductDetails = new ProductDetails;
            $insertProductDetails->title = isset($post['title']) ? $post['title'] : '';
            $insertProductDetails->sub_title = isset($post['subTitle']) ? $post['subTitle'] : '';
            $insertProductDetails->banner_img = isset($imageName) ? $imageName : '';
            $insertProductDetails->banner_description = isset($post['banneDescription']) ? $post['banneDescription'] : '';
            $insertProductDetails->product_id = isset($productId) ? $productId : '';
            $insertProductDetails->created_at = Carbon::now();
            $insertProductDetails->save();

            if ($insertProductDetails->id) {
                $response['status'] = 1;
                $response['msg'] = "Product Details Saved Successfully.";
            }
        } else {

   

            $updateProductDetails = ProductDetails::where('id', $post['hid'])->first();
            $updateProductDetails->title = isset($post['title']) ? $post['title'] : '';
            $updateProductDetails->sub_title = isset($post['subTitle']) ? $post['subTitle'] : '';

            // if ($updateProductDetails->banner_img != $post['imgHid']) {
            //     if ($request->hasFile('bannerImg')) {
                 
            //         $oldImagePath = public_path('uploads/' . $updateProductDetails->banner_img);
            //         if (File::exists($oldImagePath)) {
            //             File::delete($oldImagePath);
            //         }
            
                   
            //         $extension = $request->file('bannerImg')->getClientOriginalExtension();
            //         $updateimageName = time() . '.' . $extension;
            
            //         $uploadDirectory = 'uploads';
            //         $uploadPath = public_path($uploadDirectory);
            
            //         $request->file('bannerImg')->move($uploadPath, $updateimageName);
            
            //         $updateProductDetails->banner_img = $updateimageName;
            //     }
            // }

            if($request->hasFile('bannerImg')){
   
                $oldImagePath = public_path('uploads/' . $post['imgHid']);
               
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
                    $extension = $request->file('bannerImg')->getClientOriginalExtension();
                    $updateimageName = time() . '.' . $extension;
                    $uploadDirectory = 'uploads';
                    $uploadPath = public_path($uploadDirectory);
            
                    $request->file('bannerImg')->move($uploadPath, $updateimageName);
            
                    $updateProductDetails->banner_img = isset($updateimageName) ? $updateimageName : '';

                 
            }
            
            $updateProductDetails->banner_description = isset($post['banneDescription']) ? $post['banneDescription'] : '';
            $updateProductDetails->product_id = isset($productId) ? $productId : '';
            $updateProductDetails->updated_at = Carbon::now();

            $updateProductDetails->save();

            if ($updateProductDetails->id) {
                $response['status'] = 1;
                $response['msg'] = "Product Updated Successfully.";
            }
        }


        echo json_encode($response);
        exit();
    }


    public function productDetailsEdit(Request $request)
    {

        $post = $request->all();

        $response = array();
        $response['status'] = 0;
        $response['msg'] = "Something went wrong please try again.";

        if (isset($post['id'])) {

            $productDetails = ProductDetails::where('id', $post['id'])->get()->first();

            if (!empty($productDetails)) {
                $response['status'] = 1;
                $response['msg'] = "Product Edit Successfully.";
                $response['data'] = $productDetails;
            }
        }

        echo json_encode($response);
        exit();
    }

    public function productDetailsDelete(Request $request)
    {

        $post = $request->all();

        $response = array();
        $response['status'] = 0;
        $response['msg'] = "Something went wrong please try again.";

        if (isset($post['id'])) {

            $productDetails = ProductDetails::find($post['id']);

            if ($productDetails) {

                $imageName = $productDetails->banner_img;

                $productDetails->delete();

                if ($imageName && File::exists(public_path('uploads/' . $imageName))) {
                    File::delete(public_path('uploads/' . $imageName));
                }
            }


            if ($productDetails) {
                $response['status'] = 1;
                $response['msg'] = "Product Details Removed Successfully.";
            }
        }

        echo json_encode($response);
        exit();
    }

    public function productDescriptionSave(Request $request){
        $post = $request->all();

        $currentURL = url()->previous();
        $productId = basename($currentURL);

        $validation = Validator::make($request->all(), [
            'description1'                  => 'required',
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

            $insertProductDescription = new ProductDescription;
            $insertProductDescription->description_1 = isset($post['description1']) ? $post['description1'] : '';
            $insertProductDescription->description_2 = isset($post['description2']) ? $post['description2'] : '';
            $insertProductDescription->product_id = isset($productId) ? $productId : '';
            $insertProductDescription->created_at = Carbon::now();
            $insertProductDescription->save();

            if ($insertProductDescription->id) {
                $response['status'] = 1;
                $response['msg'] = "Product Description Saved Successfully.";
            }
        } else {

            $updateProductDescription = ProductDescription::where('id', $post['hid'])->first();
            $updateProductDescription->description_1 = isset($post['description1']) ? $post['description1'] : '';
            $updateProductDescription->description_2 = isset($post['description2']) ? $post['description2'] : '';
            $updateProductDescription->product_id = isset($productId) ? $productId : '';
            $updateProductDescription->updated_at = Carbon::now();
            $updateProductDescription->save();

            if ($updateProductDescription->id) {
                $response['status'] = 1;
                $response['msg'] = "Product Description Updated Successfully.";
            }
        }

        echo json_encode($response);
        exit();

    }

    public function technologySave(Request $request){
        $post = $request->all();
     
        $currentURL = url()->previous();
        $productId = basename($currentURL);
        // $produc = decrypt($urlId);

        $response = array();
        $response['status'] = 0;
        $response['msg'] = "Something went wrong please try again.";

        $imageName ='';

        if (!isset($post['hid']) && $post['hid'] == '') {

            if ($request->hasFile('tecImg')) {

                $extension = $request->file('tecImg')->getClientOriginalExtension();
                $imageName = time() . '.' . $extension;

                $uploadDirectory = 'uploads';

                $uploadPath = public_path($uploadDirectory);

                if (!File::exists($uploadPath)) {
                    File::makeDirectory($uploadPath, 0777, true, true);
                }

                $request->file('tecImg')->move($uploadPath, $imageName);
                $imagePath = $uploadDirectory . '/' . $imageName;
            }

            $insertProductTecDetails = new ProductTechnology;
            $insertProductTecDetails->title = isset($post['tectitle']) ? $post['tectitle'] : '';
            $insertProductTecDetails->tec_img = isset($imageName) ? $imageName : '';
            $insertProductTecDetails->tec_description = isset($post['tecdescription']) ? $post['tecdescription'] : '';
            $insertProductTecDetails->product_id = isset($productId) ? $productId : '';
            $insertProductTecDetails->created_at = Carbon::now();
            $insertProductTecDetails->save();

            if ($insertProductTecDetails->id) {
                $response['status'] = 1;
                $response['msg'] = "Product Technology Details Saved Successfully.";
            }
        }
    }

    public function subTechnologySave(Request $request){

        $post = $request->post();
       
        $response = array();
        $response['status'] = 0;
        $response['msg'] = "Something went wrong please try again.";

        $validation = Validator::make($request->all(), [
            'tecSubtitle'                  => 'required',
            'tecSubdescription'                  => 'required',
        ]);


        if ($validation->fails()) {
            $data['status'] = 0;
            $data['error'] = $validation->errors()->all();
            echo json_encode($data);
            exit();
        }
        
        $currentURL = url()->previous();
        $productId = basename($currentURL);
        // $produc = decrypt($urlId);

        if (!isset($post['hid']) && $post['hid'] == '') {

            $insertSubTechnologyDetails = new TechnologySubDetails;
            $insertSubTechnologyDetails->title = isset($post['tecSubtitle']) ? $post['tecSubtitle'] : '';
            $insertSubTechnologyDetails->tec_description = isset($post['tecSubdescription']) ? $post['tecSubdescription'] : '';
            $insertSubTechnologyDetails->product_id = isset($productId) ? $productId : '';
            $insertSubTechnologyDetails->created_at = Carbon::now();
            $insertSubTechnologyDetails->save();

            if ($insertSubTechnologyDetails->id) {
                $response['status'] = 1;
                $response['msg'] = "Product Technology Sub-Details Saved Successfully.";
            }
        }
        echo json_encode($response);
        exit();
    }

    public function addOnSave(Request $request){
        $post = $request->all();
    }
}
