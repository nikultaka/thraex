<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;




class ProductController extends Controller
{
    public function index(Request $request){

        if (!$request->isMethod('post')) {

            return view('admin.products.products');
    }
        if ($request->ajax() && $request->isMethod('post')) {

            $products =  Products::select('id','product_name')->where('status','=',1)->get();

            return Datatables::of($products)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    // $action = '<button class="" data-id="' . $row['id'] . '" id="productEdit">Edit</button>';
                    // $action .= '<button class="" data-id="' . $row['id'] . '" id="productDelete">Delete</button>';
                    // return $action;

                    $action =  '<div class="dropdown">';
                    $action .='<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>';
                    $action .= '<div class="dropdown-menu">';
                    $action .= '<a class="dropdown-item" href="'.route('products.description', ['id' => $row['id']]).'" data-id="' . $row['id'] . '" id="subproductDescription"><i class="bx bx-text"></i> Description</a>';
                    $action .= '<a class="dropdown-item" href="javascript:void(0);" data-id="' . $row['id'] . '" id="productEdit"><i class="bx bx-edit-alt me-1"></i> Edit</a>';
                    $action .='<a class="dropdown-item" href="javascript:void(0);" data-id="' . $row['id'] . '" id="productDelete"><i class="bx bx-trash me-1"></i> Delete</a>
                    </div>
                  </div>';
                    
                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);


        }
    }

    public function productSave(Request $request){
        
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

        if(empty($post['hid']) && $post['hid'] == ''){

            $insertProduct = new Products;
            $insertProduct->product_name = isset($post['productname']) ? $post['productname'] : '';
            $insertProduct->status = 1;
            $insertProduct->created_at = Carbon::now();
            $insertProduct->save();

            if($insertProduct->id){
                $response['status'] = 1;
                $response['msg'] = "Product Saved Successfully.";
            }
            }else{
            $updateProduct = Products::where('id',$post['hid'])->first();
            $updateProduct->product_name = isset($post['productname']) ? $post['productname'] : '';
            $updateProduct->status = 1;
            $updateProduct->updated_at = Carbon::now();
            $updateProduct->save();

            if($updateProduct->id){
                $response['status'] = 1;
                $response['msg'] = "Product Updated Successfully.";
            }
        }
      
        echo json_encode($response);
        exit();
    }

    public function productEdit(Request $request){

        $post = $request->all();
 
        $response = array();
        $response['status'] = 0;
        $response['msg'] = "Something went wrong please try again.";

        if(isset($post['id'])){
                
        $productUpdate = Products::where('id',$post['id'])->get()->first();

        if(!empty($productUpdate)){
            $response['status'] = 1;
            $response['msg'] = "Product Edit Successfully.";  
            $response['data'] = $productUpdate;  
        }
        }

        echo json_encode($response);
        exit();
        
    }
    public function productDelete(Request $request){
        
        $post = $request->all();
  
        $response = array();
        $response['status'] = 0;
        $response['msg'] = "Something went wrong please try again.";

        if(isset($post['id'])){
        $productsRemove = Products::where('id',$post['id'])->get()->first();
        $productsRemove->status = 0;
        $productsRemove->save();

            if($productsRemove){
                $response['status'] = 1;
                $response['msg'] = "Product Removed Successfully.";
            }
        }

        echo json_encode($response);
        exit();
    }

    public function productDescription($id = null){
        
      return view('admin.products.product-details');

    }
}
?>