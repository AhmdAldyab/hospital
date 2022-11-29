<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Patient extends Model
{
    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable=['name','date_exit','date_entry','status','adrees','blood_type_id','patient_partner','number_phone'];
}
