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
       $data=DB::table('salaries')->select('salary_month')->groupBy('salary_month')->get();
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
        $data=DB::table('salaries')
        ->join('employees','employees.id','salaries.employee_id')
        ->select('employees.*','salaries.amount','salaries.salary_month','salaries.id as salaries_id')
        ->where('salaries.id',$id)
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
            'amount' => 'required',
            'salary_month' => 'required',

        ]);
        $data['amount'] = $request->amount;

        $data['salary_month'] = $request->salary_month;

       $update=DB::table('salaries')->where('id',$id)->update($data);
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


    public function salary_based_month($id)
    {
        $data=DB::table('salaries')->join('employees','employees.id','salaries.employee_id')->select('salaries.*','employees.name as employee_name','employees.email as employee_email','employees.photo as photo','employees.salary as salary')->where('salaries.salary_month',$id)->get();
        return response()->json($data);
    }
}
