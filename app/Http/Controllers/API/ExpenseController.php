<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::table('expenses')->orderBy('id','DESC')->get();
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
            'description' => 'required',
            'amount' => 'required',
            
        ]);

        $data['description'] = $request->description;
        $data['amount'] = $request->amount;
        $data['date'] = date('d/m/Y');
        $data['day'] = date('d');
        $data['month'] = date('m');
        $data['year'] = date('Y');

        $insert=DB::table('expenses')->insert($data);
        return response('success', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=DB::table('expenses')->where('id',$id)->first();
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
            'description' => 'required',
            'amount' => 'required',
            
        ]);

        $data['description'] = $request->description;
        $data['amount'] = $request->amount;

        $insert=DB::table('expenses')->where('id',$id)->update($data);
        return response('success', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=DB::table('expenses')->where('id',$id)->delete();
        return response('success',200);
    }
}
