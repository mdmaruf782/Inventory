<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class PosController extends Controller
{
    public function GetPorductByCatId($id)
    {
       $data=DB::table('products')
       ->join('suppliers','products.supplier_id','suppliers.id')
       ->join('categories','products.category_id','categories.id')
       
       ->join('product_accounts','products.id','product_accounts.product_id')
       ->join('product_stock','products.id','product_stock.product_id')
       ->select('suppliers.name as supplier_name','categories.name as category_name','product_accounts.saleing_price','product_accounts.buying_price','product_accounts.buying_date','product_stock.quantity','products.*')
       ->orderBy('products.id','DESC')
       ->where('products.category_id',$id)
       ->get();
       return response()->json($data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
