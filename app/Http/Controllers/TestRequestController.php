<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestRequestController extends Controller
{
    // function index(){
    //     // Log::info(request()->url());
    //     // Log::info(request()->path());
    //     // Log::info(request()->method());
    //     // return "Hello Testing";

    //     // if(request()->isMethod('get')){
    //     //     echo 'get method';
    //     // }

    //     // if(request()->has('name')){
    //     //     echo 'has name';
    //     // }

    //     // if(request()->hasAny(['name','address'])){
    //     //     echo 'has name or address';
    //     // }

    //     // if(request()->missing('hh')){
    //     //     echo 'not hh';
    //     // }
        
    // }

    // function index(Request $request){
    //     return $request;
    // }

    // public function testRequest(){
    //     // return response(request(),200)->header('Content-Type','application/json');
    //     return redirect("testOther");
    // }

    // public function testResponse(){
    //     return "Hello Testing";
    // }

    public function testRequest(){
        // return response(request(),200)->header('Content-Type','application/json');
        // return redirect("testOther");
        // return view('test',array('message' => "Hello Response Testing"));

        #file download
        $tmpFileName = 'test.xlsx';
        $path = storage_path() . '/app/' .$tmpFileName;

        #headers as required from react
        $headers = [
            'Access-Control-Allow-Origin' => '*',
            'Content-Description' => 'File Transfer',
            'Content-Disposition' => 'attachment;filename=' . $tmpFileName,
            'Access-Control-Expose-Headers' => 'Content-Disposition,X-Suggested-Filename'
        ];
        return response()->download($path, $tmpFileName, $headers);
    }

    public function testResponse(){
            return "Hello Testing";
    }
}