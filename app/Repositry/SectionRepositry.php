<?php

namespace App\Repositry;

use App\Models\Docter;
use App\Models\Nurse;
use App\Models\Patient;
use App\Models\Room;
use App\Models\Section;
use App\Models\Specialization;

class SectionRepositry implements SectionRepositryInterface
{
    public function index()
    {
        $specializations = Specialization::all();
        $sections = Section::all();
        return view('pages.sections.index', compact('sections', 'specializations'));
    }

    public function create()
    {
    }

    public function show($id)
    {
        $specializations=Specialization::all();
        $sections=Section::all();
        $section=Section::where('id',$id)->first();
        $rooms=Room::where('section_id',$id)->get();
        return view('pages.sections.show',compact('rooms','specializations','sections','section'));
    }

    public function store($request)
    {
        try {
            Section::create([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'specialization_id' => $request->specialization_id,
                'description' => $request->description,
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
            $section = Section::findOrFail($request->id);
            $section->update([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'specialization_id' => $request->specialization_id,
                'description' => $request->description,
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
        try {
            $doctor = Docter::where('section_id', $request->id)->get();
            $nurse = Nurse::where('section_id', $request->id)->get();
            $patient = Patient::where('section_id', $request->id)->get();
            if ($doctor->count() > 0 || $nurse->count() > 0 || $patient->count() > 0) {
                toastr()->error(trans('section.delete_section'));
                return redirect()->route('section.index');
            }

            Section::findOrFail($request->id)->delete();

            toastr()->success(trans('massage.success'));
            return redirect()->route('section.index');
        } catch (\Exception $e) {
            toastr()->error(trans('massage.error'));
            return redirect()->back();
        }
    }
}
