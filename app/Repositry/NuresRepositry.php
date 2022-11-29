<?php

namespace App\Repositry;

use App\Models\Gender;
use App\Models\Image;
use App\Models\Nurse;
use App\Models\Section;
use App\Models\Specialization;
use Illuminate\Support\Facades\Storage;

class NuresRepositry implements NuresRepositryInterface
{
    public function index()
    {
        $nurses=Nurse::all();
        return view('pages.nurse.index',compact('nurses'));
    }

    public function create()
    {
        $sections=Section::all();
        $specializations=Specialization::all();
        $genders=Gender::all();
        return view('pages.nurse.add',compact('specializations','genders','sections'));
    }

    public function show($id)
    {
        $name = Nurse::findOrFail($id)->name;
        $files = Image::where('imageable_id', $id)->where('imageable_type', 'App\Models\Nurse')->get();
        return view('pages.nurse.show_attch', compact('files', 'name'));
    }

    public function store($request)
    {
        try {
            Nurse::create([
                'name'=>['en'=>$request->name_en,'ar'=>$request->name_ar],
                'password'=>$request->password,
                'email'=>$request->email,
                'date_hiring'=>$request->date_hiring,
                'adrees'=>$request->adrees,
                'number_phone'=>$request->number_phone,
                'specialization_id'=>$request->specialization_id,
                'gender_id'=>$request->gender_id,
                'section_id' => $request->section_id,
            ]);

            $id = Nurse::where('email', $request->email)->first()->id;

            if ($request->hasfile('files_doctor')) {
                $files = $request->file('files_doctor');
                foreach ($files as $file) {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('nurses/' . $request->name_en, $name, 'attachments');
                    Image::create([
                        'filename' => $name,
                        'imageable_id' => $id,
                        'imageable_type' => 'App\Models\Nurse',
                    ]);
                }
            }

            toastr()->success(trans('massage.success'));
            return redirect()->route('nurse.index');
        } catch (\Exception $e) {
            toastr()->error(trans('massage.error'));
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $sections=Section::all();
        $nurse=Nurse::findOrFail($id);
        $specializations=Specialization::all();
        $genders=Gender::all();
        return view('pages.nurse.edit',compact('specializations','genders','nurse','sections'));
    }

    public function update($request)
    {
        try {
            $nurse=Nurse::findOrFail($request->id);
            if (!empty($request->password)) {
                $nurse->update([
                    'name'=>['en'=>$request->name_en,'ar'=>$request->name_ar],
                    'password'=>$request->password,
                    'email'=>$request->email,
                    'date_hiring'=>$request->date_hiring,
                    'adrees'=>$request->adrees,
                    'number_phone'=>$request->number_phone,
                    'specialization_id'=>$request->specialization_id,
                    'gender_id'=>$request->gender_id,
                    'section_id' => $request->section_id,
                ]);    
            } else {
                $nurse->update([
                    'name'=>['en'=>$request->name_en,'ar'=>$request->name_ar],
                    'email'=>$request->email,
                    'date_hiring'=>$request->date_hiring,
                    'adrees'=>$request->adrees,
                    'number_phone'=>$request->number_phone,
                    'specialization_id'=>$request->specialization_id,
                    'gender_id'=>$request->gender_id,
                    'section_id' => $request->section_id,
                ]);
                
            }

            $id = Nurse::where('email', $request->email)->first()->id;

            if ($request->hasfile('files_doctor')) {
                $files = $request->file('files_doctor');
                foreach ($files as $file) {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('nurses/' . $request->name_en, $name, 'attachments');
                    Image::create([
                        'filename' => $name,
                        'imageable_id' => $id,
                        'imageable_type' => 'App\Models\Nurse',
                    ]);
                }
            }


            
            toastr()->success(trans('massage.success'));
            return redirect()->route('nurse.index');
        } catch (\Exception $e) {
            toastr()->error(trans('massage.error'));
            return redirect()->back();
        }
    }

    public function destroy($request)
    {
        try {
            Storage::disk('attachments')->deleteDirectory('nurses/' . $request->name);
            Image::where('imageable_id', $request->id)->where('imageable_type', 'App\Models\Nurse');
            Nurse::findOrFail($request->id)->delete();
            toastr()->success(trans('massage.success'));
            return redirect()->route('nurse.index');
        } catch (\Exception $e) {
            toastr()->error(trans('massage.error'));
            return redirect()->back();
        }
    }

    public function delete_attch($id)
    {
        try {
            $file_name = Image::where('id', $id)->first();
            $name = Nurse::where('id', $file_name->imageable_id)->first();
            Storage::disk('attachments')->delete('nurses/' . $name->getTranslation('name', 'en') . '/' . $file_name->filename);
            Image::destroy($id);
            toastr()->success(trans('massage.success'));
            return redirect()->route('nurse.show', $name->id);
        } catch (\Exception $e) {
            toastr()->error(trans('massage.error'));
            return redirect()->back();
        }
    }

    public function open_file($id)
    {
        try {
            $file_name = Image::where('id', $id)->first();
            $name = Nurse::where('id', $file_name->imageable_id)->first();
            $file = Storage::disk('attachments')->getDriver()->getAdapter()->applyPathPrefix('nurses/' . $name->getTranslation('name', 'en') . '/' . $file_name->filename);
            return response()->file($file);
        } catch (\Throwable $th) {
            toastr()->error(trans('massage.error'));
            return redirect()->back();
        }
    }

    public function download($id)
    {
        try {
            $file_name = Image::where('id', $id)->first();
            $name = Nurse::where('id', $file_name->imageable_id)->first();
            $file = Storage::disk('attachments')->getDriver()->getAdapter()->applyPathPrefix('nurses/' . $name->getTranslation('name', 'en') . '/' . $file_name->filename);
            return response()->download($file);
        } catch (\Throwable $th) {
            toastr()->error(trans('massage.error'));
            return redirect()->back();
        }
    }

}