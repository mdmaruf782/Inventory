<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Image;
class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::table('suppliers')->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:suppliers',

            'address' => 'required',

            'phone' => 'required',
            'shop_name'=> 'required',


        ]);

        if ($request->photo) {
           $position=strpos($request->photo, ';');
           $sub=substr($request->photo,0,$position);
           $ext=explode('/', $sub)[1];
           $name=time().".".$ext;
           $img=Image::make($request->photo)->resize(240,200);
           $upload_path='backend/suppliers/';
           $img_url=$upload_path.$name;
           $img->save($img_url);


           $data['name']=$request->name;
           $data['email']=$request->email;
           $data['phone']=$request->phone;

           $data['address']=$request->address;

           $data['shop_name']=$request->shop_name;
           $data['photo']=$img_url;

           $store=DB::table('suppliers')->insert($data);

           return response()->json($store);


       }
       else{
         $data['name']=$request->name;
         $data['email']=$request->email;
         $data['phone']=$request->phone;

         $data['address']=$request->address;

         $data['shop_name']=$request->shop_name;


         $store=DB::table('suppliers')->insert($data);

         return response()->json($store);

     }

 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data =DB::table('suppliers')->where('id',$id)->first();
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {



         $data['name']=$request->name;
         $data['email']=$request->email;
         $data['phone']=$request->phone;

         $data['address']=$request->address;

         $data['shop_name']=$request->shop_name;


       $image=$request->newphoto;
       if ($image) {
        $position=strpos($request->newphoto, ';');
        $sub=substr($request->newphoto,0,$position);
        $ext=explode('/', $sub)[1];
        $name=time().".".$ext;
        $img=Image::make($request->newphoto)->resize(240,200);
        $upload_path='backend/suppliers/';
        $img_url=$upload_path.$name;
       $success= $img->save($img_url);
        if  ($success) {
           $data['photo']=$img_url;
           $img=DB::table('suppliers')->where('id',$id)->first();
           $image_path = $img->photo;
           if (empty($image_path)==false) {
               unlink($image_path);
           }
         
           $user=DB::table('suppliers')->where('id',$id)->update($data); 
       }
     }
     else{
        $oldlogo=$request->photo;       
         $data['photo']=$oldlogo;  
         DB::table('suppliers')->where('id',$id)->update($data); 

     }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=DB::table('suppliers')->where('id',$id)->first();
        unlink($data->photo);
        DB::table('suppliers')->where('id',$id)->delete();
    }
}
