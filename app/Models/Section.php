<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable=['name','description','specialization_id'];
    public function specialization()
    {
        return $this->belongsTo('App\Models\Specialization','specialization_id');
    }
}
