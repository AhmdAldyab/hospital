<?php

namespace App\Repositry;

use App\Models\Room;

class RoomRepositry implements RoomRepositryInterface
{
    public function index()
    {

    }

    public function create()
    {

    }

    public function show($id)
    {

    }

    public function store($request)
    {
        try {
            Room::create([
                'name'=>['en'=>$request->name_en,'ar'=>$request->name_ar],
                'description'=>$request->description,
                'section_id'=>$request->id,
                'specialization_id'=>$request->specialization_id,
            ]);
            toastr()->success(trans('massage.success'));
            return redirect()->route('section.index');
        } catch (\Exception $e) {
            toastr()->error(trans('massage.error'));
            return redirect()->back();
        }
    }

    public function edit($id)
    {

    }

    public function update($request)
    {
        try {
            $room=Room::findOrFail($request->id);
            $room->update([
                'name'=>['en'=>$request->name_en,'ar'=>$request->name_ar],
                'description'=>$request->description,
            ]);
            toastr()->success(trans('massage.success'));
            return redirect()->route('section.index');
        } catch (\Exception $e) {
            toastr()->error(trans('massage.error'));
            return redirect()->back();
        }
    }

    public function destroy($request)
    {

    }
}