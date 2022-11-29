<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNurse;
use App\Models\Nurse;
use App\Repositry\NuresRepositryInterface;
use Illuminate\Http\Request;

class NurseController extends Controller
{
    protected $nurse;
    public function __construct(NuresRepositryInterface $nurse)
    {
        $this->nurse=$nurse;
    }
    public function index()
    {
        return $this->nurse->index();
    }

    public function create()
    {
        return $this->nurse->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNurse $request)
    {
        return $this->nurse->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->nurse->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->nurse->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function update(StoreNurse $request)
    {
        return $this->nurse->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->nurse->destroy($request);
    }

    public function delete_attch($id)
    {
        return $this->nurse->delete_attch($id);
    }

    public function open_file($id)
    {
        return $this->nurse->open_file($id);
    }

    public function download($id)
    {
        return $this->nurse->download($id);
    }
}
