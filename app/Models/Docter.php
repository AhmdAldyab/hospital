<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Docter extends Model
{
    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable=['name','password','email','date_hiring','adrees','specialization_id','section_id','gender_id','number_phone'];

    public function specialization()
    {
        return $this->belongsTo('App\Models\Specialization','specialization_id');
    }
    public function gender()
    {
        return $this->belongsTo('App\Models\Gender','gender_id');
    }
    public function section()
    {
        return $this->belongsTo('App\Models\Section','section_id');
    }
    public function images()
    {
        return $this->morphMany('App\Models\Image','imageable');
    }
}
