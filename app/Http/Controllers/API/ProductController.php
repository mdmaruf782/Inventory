<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data=DB::table('products')
             ->join('suppliers','products.supplier_id','suppliers.id')
             ->join('categories','products.category_id','categories.id')
             
             ->join('product_accounts','products.id','product_accounts.product_id')
             ->join('product_stock','products.id','product_stock.product_id')
             ->select('suppliers.name as supplier_name','categories.name as category_name','product_accounts.saleing_price','product_accounts.buying_price','product_accounts.buying_date','product_stock.quantity','products.*')
             ->orderBy('products.id','DESC')
             ->get();
        return response()->json($data);     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'product_name' => 'required',
            'product_code' => 'required|unique:products',
            'category_id' => 'required',
            'root' => 'required',
            'saleing_price'=> 'required',
        ]);

          if ($request->image) {
           $position=strpos($request->image, ';');
           $sub=substr($request->image,0,$position);
           $ext=explode('/', $sub)[1];
           $name=time().".".$ext;
           $img=Image::make($request->image)->resize(240,200);
           $upload_path='backend/products/';
           $img_url=$upload_path.$name;
           $img->save($img_url);


           $product['product_name']=$request->product_name;
           $product['product_code']=$request->product_code;
           $product['category_id']=$request->category_id;
           $product['supplier_id']=$request->supplier_id;
           $product['root']=$request->root;
           $product['image']=$img_url;

          
          

           $productId=DB::table('products')->insertGetId($product);

           $product_accounts['product_id']=$productId;
           $product_accounts['buying_date']=$request->buying_date;
           $product_accounts['buying_price']=$request->buying_price;
           $product_accounts['saleing_price']=$request->saleing_price;
           $product_accounts['day']=date('d');
           $product_accounts['month']=date('m');
           $product_accounts['year']=date('Y');

           $Insert_product_accounts=DB::table('product_accounts')->insert($product_accounts);

           $product_stock['product_id']= $productId;
           $product_stock['quantity']= $request->quantity;

            $stockInsert=DB::table('product_stock')->insert($product_stock);

            return response('Inserted', 200);



       }
       else{
        $product['product_name']=$request->product_name;
           $product['product_code']=$request->product_code;
           $product['category_id']=$request->category_id;
           $product['supplier_id']=$request->supplier_id;
           $product['root']=$request->root;
          

          
          

           $productId=DB::table('products')->insertGetId($product);

           $product_accounts['product_id']=$productId;
           $product_accounts['buying_price']=$request->buying_price;
           $product_accounts['saleing_price']=$request->saleing_price;
           $product_accounts['day']=date('d');
           $product_accounts['month']=date('m');
           $product_accounts['year']=date('Y');

           $Insert_product_accounts=DB::table('product_accounts')->insert($product_accounts);

           $product_stock['product_id']= $productId;
           $product_stock['quantity']= $request->quantity;

            $stockInsert=DB::table('product_stock')->insert($product_stock);

            return response('Inserted', 200);

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
         $data=DB::table('products')
             
            
             
             ->join('product_accounts','products.id','product_accounts.product_id')
             ->join('product_stock','products.id','product_stock.product_id')
             ->select('product_accounts.saleing_price','product_accounts.buying_price','product_accounts.buying_date','product_stock.quantity','products.*')
             ->where('products.id',$id)
             ->first();

         return response()->json($data);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
         $validatedData = $request->validate([
            'product_name' => 'required',
            'product_code' => 'required',
            'category_id' => 'required',
            'root' => 'required',
            'saleing_price'=> 'required',
        ]);

            $get_image=DB::table('products')->where('id',$id)->first();
          if ($request->image != $get_image->image) {
           $position=strpos($request->image, ';');
           $sub=substr($request->image,0,$position);
           $ext=explode('/', $sub)[1];
           $name=time().".".$ext;
           $img=Image::make($request->image)->resize(240,200);
           $upload_path='backend/products/';
           $img_url=$upload_path.$name;
           $img->save($img_url);

           
           unlink($get_image->image);

           $product['product_name']=$request->product_name;
           $product['product_code']=$request->product_code;
           $product['category_id']=$request->category_id;
           $product['supplier_id']=$request->supplier_id;
           $product['root']=$request->root;
           $product['image']=$img_url;

          
          

           $productId=DB::table('products')->where('id',$id)->update($product);

          
           $product_accounts['buying_date']=$request->buying_date;
           $product_accounts['buying_price']=$request->buying_price;
           $product_accounts['saleing_price']=$request->saleing_price;
           

           $Insert_product_accounts=DB::table('product_accounts')->where('product_id',$id)->update($product_accounts);

         
           $product_stock['quantity']= $request->quantity;

            $stockInsert=DB::table('product_stock')->where('product_id',$id)->update($product_stock);

            return response('updated', 200);



       }
       else{
           $product['product_name']=$request->product_name;
           $product['product_code']=$request->product_code;
           $product['category_id']=$request->category_id;
           $product['supplier_id']=$request->supplier_id;
           $product['root']=$request->root;
          

          
          

           $productId=DB::table('products')->where('id',$id)->update($product);

           
           $product_accounts['buying_price']=$request->buying_price;
           $product_accounts['saleing_price']=$request->saleing_price;
           

           $Insert_product_accounts=DB::table('product_accounts')->where('product_id',$id)->update($product_accounts);

          
           $product_stock['quantity']= $request->quantity;

            $stockInsert=DB::table('product_stock')->where('product_id',$id)->update($product_stock);

            return response('Inserted', 200);

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
         $img=DB::table('products')->where('id',$id)->first();
         if ($img->image) {
            unlink($img->image);
            DB::table('product_stock')->where('product_id',$id)->delete();
            DB::table('product_accounts')->where('product_id',$id)->delete();
            DB::table('products')->where('id',$id)->delete();
        }
        else{
           DB::table('product_stock')->where('product_id',$id)->delete();
           DB::table('product_accounts')->where('product_id',$id)->delete();
           DB::table('products')->where('id',$id)->delete();
       }
    }
}
