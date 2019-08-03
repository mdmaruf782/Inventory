<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Resources\Json\ResourceCollection;
class SalaryController extends Controller
{
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
            'amount' => 'required',
            'salary_month' => 'required',

        ]);
        $data['amount'] = $request->amount;
        $data['employee_id'] = $request->employee_id;
        $data['salary_date'] = date('d/m/Y');
        $data['salary_month'] = $request->salary_month;
        $data['salary_year'] =date('Y');

        $check=DB::table('salaries')->where('employee_id',$request->employee_id)->where('salary_month',$request->salary_month)->first();
        if ($check) {
         return response()->json(['title' => 'salary already paid','type' => 'error']);
     }
     else{
        DB::table('salaries')->insert($data);
        return response()->json(
            [
                'title' => 'Payament Succeess',
                'type' => 'success'
            ]);
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
        //
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
