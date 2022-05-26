<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

/**
 * Product Controller
 *
 * @author  hannykoko
 * @create  25/05/2022
 */

class ProductController extends Controller
{
    /**
     * To create product data
     * 
     * @create  25/05/2022
     * @author  hannykoko
     * @param Request $request
     * @return Response object
     */

    #insert datas to the table
    public function create(Request $request)
    {   
        $insert = [
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'created_emp' => $request->login_id,
            'updated_emp' => $request->login_id,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::beginTransaction();
        $code_exists = Product::where('code',$request->code)->exists();
        if(!$code_exists){
            try{
                #save products table
                Product::insert($insert);

                DB::commit();
                return response()->json(['status'=> 'OK', 'message'=>'Created successfully'],200);
            }catch (Exception $e){
                DB::rollBack();
                Log::debug($e->getMessage());
                return response()->json(['status'=> 'NG', 'message'=>'Fail to save'],200);
            }
        }else{
            return response()->json(['status'=>'NG','message'=>"Product code $request->code already exists"]);
        }
    }

    /**
     * To get all product data
     * 
     * @index  25/05/2022
     * @author  hannykoko
     * @return Response object
     */

    public function index()
    {
        #get all data from 'products' table
        $products = Product::whereNull('deleted_at')->get();
        Log::info($products);
        // dd($products);
        

        if (!empty($products)){
            return response()->json(['status' => 'OK', 'data'=> $products],200);
        }else{
            return response()->json(['status' => 'NG', 'message'=>'Data is not found'],200);
        }
    }

    /**
     * To update product data
     * 
     * @update  26/05/2022
     * @author  hannykoko
     * @param Request $request,$id
     * @return Response object
     */
    #uptate existing datas from the table
    public function update(Request $request,$id)
    {
        $update = [
            'name'=> $request->name,
            'code'=> $request->code,
            'description'=> $request->description,
            'updated_emp'=> $request->login_id,
            'updated_at' => now()
        ];
        DB::beginTransaction();
        $product_exists = Product::where('id',$id)->exists();
        $code_exists = Product::where('code',$request->code)->exists();
        // dd($code_exists);
        if($product_exists){
            if(!$code_exists){
                try{
                    Product::where('id', $id)->update($update);
                    DB::commit();
                    return response()->json(['status'=>'OK','message'=>'updated successfully'],200);
                }catch(Exception $e){
                    DB::rollBack();
                    Log::debug($e->getMessage());
                    return response()->json(['status'=> 'NG', 'message'=>'Fail to update'],200);
                }
            }else{
                return response()->json(['status'=>'NG','message'=>"Product code $request->code already exists"],200);
            }
        }else{
            return response()->json(['status'=>'NG','message'=>"Id $id does not exist."],200);
        }
        
        
    }

    /**
     * To delete product data
     * 
     * @delete  26/05/2022
     * @author  hannykoko
     * @param Request $id
     * @return Response object
     */
    #delete datas from the table
    public function delete($id){
        
        $product_exists = Product::where('id',$id)->exists();
        if($product_exists){
            DB::beginTransaction();
            try{
                Product::where ('id',$id)->delete();
                DB::commit();
                return response()->json(['status'=> 'OK', 'message'=>'deleted successfully'],200);
            }catch(Exception $e){
                DB::rollBack();
                Log::debug($e->getMessage());
                return response()->json(['status'=> 'NG', 'message'=>'Fail to delete'],200);
            }
        }else{
            return response()->json(['status'=>'NG', 'message'=>"Id $id does not exist"],200);
        }

    }

    /**
     * To retrieve certain product data
     * 
     * @show  26/05/2022
     * @author  hannykoko
     * @param Request $id
     * @return Response object
     */
    #retrieving data with input id
    public function show($id){
        DB::beginTransaction();
        $id_exists = Product::where('id',$id)->exists();
        if($id_exists){
            $row = Product::where('id',$id)->get();
            Log::info($row);
            if($row->isNotEmpty()){
                return response()->json(['status'=>'OK','data'=>$row],200);
            }else{
                return response()->json(['status'=>'NG','message'=>'Data not found'],200);
            }
        }else{
            return response()->json(['status'=>'NG','message'=>"Id $id does not exist"],200);
        }
    }
}
