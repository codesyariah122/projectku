<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $where = [
            'id', 'desc'
        ];
        $employee = new Employee;
        $dataEmploye = $employee->show('employees', $where);

        $data = [
            'title'=>'Employee Page',
            'no'=>0,
            'employees' => $dataEmploye 
        ];

        // dd($dataEmploye);

        return view('test.employee', $data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Emplooye  $emplooye
     * @return \Illuminate\Http\Response
     */
    public function show(Emplooye $emplooye)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Emplooye  $emplooye
     * @return \Illuminate\Http\Response
     */
    public function edit(Emplooye $emplooye)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Emplooye  $emplooye
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emplooye $emplooye)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Emplooye  $emplooye
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emplooye $emplooye)
    {
        //
    }
}
