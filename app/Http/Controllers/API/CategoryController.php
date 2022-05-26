<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

/**
 * Category Controller
 *
 * @author  hannykoko
 * @create  26/05/2022
 */

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @author hannykoko
     * @create  26/05/2022
     */
    public function index()
    {
        #get all data from 'products' table
        $categories = Category::whereNull('deleted_at')->get();//->toArray(),#Use when !empty() is used to avoid returning empty arrays
        Log::info($categories);
        // dd($products);
        

        if ($categories->isNotEmpty()){
            return response()->json(['status' => 'OK', 'data'=> $categories],200);
        }else{
            return response()->json(['status' => 'NG', 'message'=>'Data is not found!'],200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @author hannykoko
     * @create  26/05/2022
     */
    public function store(Request $request)
    {
        $insert =[
            'name'=>$request->name,
            'created_emp'=>$request->login_id,
            'updated_emp'=>$request->login_id,
            'created_at'=>now(),
            'updated_at'=>now(),
        ];
        DB::beginTransaction();
        #retrieve data where name = name from DB
        $data = Category::where('name',$request->name)->get();
        #check if the same name exists
        if($data->isNotEmpty()){
            return response()->json(['status'=> 'NG', 'message'=>'Name already exist'],200);
        }else{
            try{
                #save products table
                Category::insert($insert);

                DB::commit();
                return response()->json(['status'=> 'OK', 'message'=>'Created successfully'],200);
            }catch (Exception $e){
                DB::rollBack();
                Log::debug($e->getMessage());
                return response()->json(['status'=> 'NG', 'message'=>'Fail to save'],200);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @author hannykoko
     * @create  26/05/2022
     */
    public function show($id)
    {   
        DB::beginTransaction();
        $data = Category::where('id',$id)->get();
        if($data->isNotEmpty()){
            $row = Category::where('id',$id)->get();
            Log::info($row);
            // dd($products);
            if (!empty($row)){
                return response()->json(['status' => 'OK', 'data'=> $row],200);
            }else{
                return response()->json(['status' => 'NG', 'message'=>'Data is not found'],200);
            }
        }else{
            return response()->json(['status'=> 'NG', 'message'=>"id $id does not exist."],200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @author hannykoko
     * @create  26/05/2022
     */
    public function update(Request $request, $id)
    {
        $update=[
            'name'=>$request->name,
            'updated_emp'=>$request->login_id,
            'updated_at'=>now(),
        ];
        DB::beginTransaction();
        $data = Category::where('id',$id)->get();
        if($data->isNotEmpty()){
            try{
                Category::where('id',$id)->update($update);

                DB::commit();
                return response()->json(['status'=>'OK','message'=>'Updated successfully'],200);
            }catch(Exception $e){
                DB::rollBack();
                Log::debug($e->getMessage());
                return response()->json(['status'=>'NG','message'=>'Update failed'],200);
            }
        }else{
            return response()->json(['status'=> 'NG', 'message'=>"id $id does not exist."],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @author hannykoko
     * @create  26/05/2022
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        $data = Category::where('id',$id)->get();
        if($data->isNotEmpty()){
            try{
                Category::where('id',$id)->delete();
                DB::commit();
                return response()->json(['status'=>'OK','message'=>'Deleted successfully'],200);
            }catch(Exception $e){
                DB::rollBack();
                Log::debug($e->getMessage());
                return response()->json(['status'=>'NG','message'=>'Delete failed'],200);
            }
        }else{
            return response()->json(['status'=> 'NG', 'message'=>"id $id does not exist."],200);
        }
    }
}
