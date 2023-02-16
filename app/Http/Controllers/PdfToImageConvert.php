<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PdfToImageConvert extends Controller
{
    //
    public function saveAllData(Request $request)
    {
       
        $base64_str = substr($request->selected_image, strpos($request->selected_image, ",")+1);
         $image = base64_decode($base64_str);
        $randomNum = Str::random(10);
        $safeNamepng = $randomNum.'_'.$request->selected_page.'.'.'png';
        $safeNamejson = $randomNum.'_'.$request->selected_page.'.'.'json';
        Storage::disk('local')->put('pngs/'.$safeNamepng, $image);
        $allData = [];
        for($i = 0; $i < count($request->input('product_category')); $i++) {

   $data = [
            "product_category" => $request->input('product_category')[$i],
            "product_category_2" => $request->input('product_category_2')[$i],
            "qty" => $request->input('qty')[$i],
            "unit_price" => $request->input('unit_price')[$i],
            "position" => $request->input('position')[$i],
            "art_nr" => $request->input('art_nr')[$i],
            "description" => $request->input('description')[$i],
            "img" => asset('pngs/'.$safeNamepng),
            "qty_unit" => $request->input('qty_unit')[$i],
            "total_price" =>$request->input('total_price')[$i]
        ];
        array_push($allData,$data);
}

         $data = [
            "product_category" => $request->product_category,
            "product_category_2" => $request->product_category_2,
            "qty" => $request->qty,
            "unit_price" => $request->unit_price,
            "position" => $request->position,
            "art_nr" => $request->art_nr,
            "description" => $request->description,
            "img" => asset('pngs/'.$safeNamepng),
            "qty_unit" => $request->qty_unit,
            "total_price" =>$request->total_price
        ];

        Storage::disk('local')->put('jsons/'.$safeNamejson, json_encode($allData));

        return response()->json([
            "status" => 'ok',
            "png" => asset('pngs/'.$safeNamepng),
            "json" => asset('jsons/'.$safeNamejson),
            "selected_page" => $request->selected_page
      ], 200);
    }
}
