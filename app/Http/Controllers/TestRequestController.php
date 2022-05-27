<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
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

    // public function testRequest(){
    //     // return response(request(),200)->header('Content-Type','application/json');
    //     // return redirect("testOther");
    //     // return view('test',array('message' => "Hello Response Testing"));

    //     #file download
    //     $tmpFileName = 'test.xlsx';
    //     $path = storage_path() . '/app/' .$tmpFileName;

    //     #headers as required from react
    //     $headers = [
    //         'Access-Control-Allow-Origin' => '*',
    //         'Content-Description' => 'File Transfer',
    //         'Content-Disposition' => 'attachment;filename=' . $tmpFileName,
    //         'Access-Control-Expose-Headers' => 'Content-Disposition,X-Suggested-Filename'
    //     ];
    //     // return response()->download($path, $tmpFileName, $headers);
    //     return response()->download($path, $tmpFileName, $headers)->deleteFileAfterSend(true);
    // }

    // public function testResponse(){
    //         return "Hello Testing";
    // }

    
    public function fileUpload(Request $request){
        // #1 file upload
        // $file = $request->file('file');
        // //Log::info($file);
        // $name = $request->file->getClientOriginalName();
        // //Log::info($name);
        // $content =file_get_contents($request->file);
        // //Log::info($content);
        
        // $upload = $request->file('file')->storeAs('public',$name);

        #resize uploded image
        $originalImage= $request->file('filename');
        // echo 'File Size: '.$originalImage->getSize();
        $height = Image::make($originalImage)->height();
        $width = Image::make($originalImage)->width();
        echo 'Img height:' .$height;
        echo '<br>';
        echo 'Img width:' .$width;
        $thumbnailImage = Image::make($originalImage);
        $thumbnailPath = storage_path().'/app/';
        // $originalPath = public_path().'/images/';
        // $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
        $thumbnailImage->resize(150,150);
        $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName()); 

        
        // #2 file download
        // if($upload){
        //     //Log::info($path);
        //     // $tmpFileName = 'kites.png';
        //     $path = storage_path().'/app/public/'.$name;
        //     $headers = [
        //         'Access-Control-Allow-Origin' => '*',
        //         'Content-Description' => 'File Transfer',
        //         'Content-Disposition' => 'attachment;filename=' . $name,
        //         'Access-Control-Expose-Headers' => 'Content-Disposition,X-Suggested-Filename'
        //     ];
        //     return response()->download($path, $name, $headers);
        // }
    }
        
}
    

    
