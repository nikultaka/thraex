<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutCms;
use App\Models\AddOns;
use App\Models\ContactCms;
use App\Models\Products;
use App\Models\SubProducts;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\File;


class MainController extends Controller
{
    public function index()
    {
        $products = array();
       
        $products = Products::select('products.id as products_id', 'products.product_name', 'sub_products.id as sub_products_id', 'sub_products.subproduct_name as subproduct_name')
            ->leftJoin('sub_products', 'products.id', '=', 'sub_products.product_id')
            ->where('products.status', '=', '1')
            ->orWhere('sub_products.status', '=', '1')
            ->get()
            ->toArray();

        $groupedProducts = [];

        foreach ($products as $product) {
            $productId = $product['products_id'];


            if (!isset($groupedProducts[$productId])) {
                $groupedProducts[$productId] = [
                    'products_id' => $productId,
                    'product_name' => $product['product_name'],
                    'subproducts' => [],
                ];
            }


            if (!empty($product['sub_products_id'])) {

                $groupedProducts[$productId]['subproducts'][] = [
                    'sub_products_id' => $product['sub_products_id'],
                    'subproduct_name' => $product['subproduct_name'],
                ];
            }
        }


        $groupedProducts = array_values($groupedProducts);
      

        // return view('frontend.pages.home')->with(compact('groupedProducts'));
        return view('frontend.pages.home');
    }
    public function getSubproducts($productId = null)
    {
        $subProducts = array();

        $response = array();
        $response['status'] = 0;
        $response['msg'] = "Something went wrong please try again.";

        $subProducts = SubProducts::select('*')->where('product_id', '=', $productId)->get()->toArray();

        if (!empty($subProducts) && count($subProducts) > 0) {
            $response['status'] = 1;
            $response['msg'] = "SubProducts Found Successfully.";
            $response['subproducts'] = $subProducts;
        }

        echo json_encode($response);
        exit();
    }

    public function about(Request $request)
    {

        $aboutCms = array();
        
        $aboutCms = AboutCms::select('*')->first();

        return view('frontend.pages.about')->with(compact('aboutCms'));
    }

    public function contact(Request $request)
    {
        $contactCms = array();
        
        $contactCms = ContactCms::select('*')->first();

        return view('frontend.pages.contact')->with(compact('contactCms'));
    }


    public function sendmail(Request $request)
    {
        $post = $request->all();
      
        $details = [
            'subject' => isset($post['subject']) ? $post['subject'] : '',
            'name' => isset($post['name']) ? $post['name'] : '',
            'email' => isset($post['email']) ? $post['email'] : '',
            'message' => isset($post['message']) ? $post['message'] : '',
        ];

        \Mail::to('mihirchauhan427@gmail.com')->send(new \App\Mail\thraexMail($details));

        $response['status'] = 1; 
        $response['msg'] = "Mail Sent Successfully"; 
        
        echo json_encode($response);
        exit();
    }

    public function details($id = null,Request $request)
    {

        $subId = decrypt($id);

       $addons = array();
       $addons = AddOns::select('addons.*','sub_products.subproduct_name as subproduct_name')
       ->leftJoin('sub_products', 'addons.subproduct_id', '=', 'sub_products.id')
       ->where('subproduct_id', '=', $subId)->get()->toArray();
    //    echo '<pre>';
    //    print_r($addons);
    //    die;
     

        return view('frontend.pages.details')->with(compact('addons'));
    }

}
