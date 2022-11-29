<?php

namespace App\Repositry;

interface DoctorRepositryInterface
{
    public function index();

    public function create();

    public function show($id);

    public function store($request);

    public function edit($id);

    public function update($request);

    public function destroy($request);

    public function delete_attch($id);

    public function open_file($id);

    public function download($id);

}