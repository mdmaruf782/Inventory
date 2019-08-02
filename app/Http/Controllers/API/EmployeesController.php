<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Image;
class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $data=DB::table('employees')->get();
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
      'email' => 'required|unique:employees',
      'salary' => 'required',
      'address' => 'required',
      'nid' => 'required',
      'date' => 'required',
           // 'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',


    ]);

       if ($request->photo) {
           $position=strpos($request->photo, ';');
           $sub=substr($request->photo,0,$position);
           $ext=explode('/', $sub)[1];
           $name=time().".".$ext;
           $img=Image::make($request->photo)->resize(240,200);
           $upload_path='backend/employee/';
           $img_url=$upload_path.$name;
           $img->save($img_url);


           $data['name']=$request->name;
           $data['email']=$request->email;
           $data['salary']=$request->salary;
           $data['address']=$request->address;
           $data['nid']=$request->nid;
           $data['joining_date']=$request->date;
           $data['photo']=$img_url;

           $store=DB::table('employees')->insert($data);

           return response()->json($store);


       }
       else{
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['salary']=$request->salary;
        $data['address']=$request->address;
        $data['nid']=$request->nid;
        $data['joining_date']=$request->date;


        $store=DB::table('employees')->insert($data);

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
     $data=DB::table('employees')->where('id',$id)->first();
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
      $data=array();
      $data['name']=$request->name;
      $data['email']=$request->email;
      
      $data['address']=$request->address;
      $data['salary']=$request->salary;
      $data['nid']=$request->nid;
      $data['joining_date']=$request->joining_date;
      $image=$request->newphoto;
      if ($image) {
        $position=strpos($request->photo, ';');
        $sub=substr($request->photo,0,$position);
        $ext=explode('/', $sub)[1];
        $name=time().".".$ext;
        $img=Image::make($request->photo)->resize(240,200);
        $upload_path='backend/employee/';
        $img_url=$upload_path.$name;
        $img->save($img_url);
        if  ($success) {
         $data['photo']=$image_url;
         $img=DB::table('employees')->where('id',$id)->first();
         $image_path = $img->photo;
         $done=unlink($image_path);
         $user=DB::table('employees')->where('id',$id)->update($data); 
       }
     }else{
       $oldlogo=$request->photo;       
       $data['photo']=$oldlogo;  
       DB::table('employees')->where('id',$id)->update($data); 
       
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
        $img=DB::table('employees')->where('id',$id)->first();
        if ($img->photo) {
            unlink($img->photo);
            DB::table('employees')->where('id',$id)->delete();
        }
        else{
             DB::table('employees')->where('id',$id)->delete();
        }

    }
}
