<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctor;
use App\Models\Docter;
use App\Repositry\DoctorRepositryInterface;
use Illuminate\Http\Request;

class DocterController extends Controller
{
    protected $docter;
    public function __construct(DoctorRepositryInterface $doctor)
    {
        $this->docter=$doctor;
    }
    public function index()
    {
        return $this->docter->index();
    }

    public function create()
    {
        return $this->docter->create();
    }

    public function store(StoreDoctor $request)
    {
        return $this->docter->store($request);
    }

    public function show($id)
    {
        return $this->docter->show($id);
    }

    public function edit($id)
    {
        return $this->docter->edit($id);
    }

    public function update(StoreDoctor $request)
    {
        return $this->docter->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->docter->destroy($request);
    }
    public function delete_attch($id)
    {
        return $this->docter->delete_attch($id);
    }

    public function open_file($id)
    {
        return $this->docter->open_file($id);
    }

    public function download($id)
    {
        return $this->docter->download($id);
    }
}
