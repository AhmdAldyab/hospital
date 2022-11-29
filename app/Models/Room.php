<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Room extends Model
{
    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable=['name','description','specialization_id','section_id'];
    public function specialization()
    {
        return $this->belongsTo('App\Models\Specialization','specialization_id');
    }
    public function section()
    {
        return $this->belongsTo('App\Models\Section','section_id');
    }
}
