<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubProducts;
use App\Models\Products;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;




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
                    $action .= '<a class="dropdown-item" href="'.route('subproducts.description', ['id' => $row['id']]).'" data-id="' . $row['id'] . '" id="subproductDescription"><i class="bx bx-text"></i> Description</a>';
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
}
