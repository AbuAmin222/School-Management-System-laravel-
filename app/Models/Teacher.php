<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    static function getQualifications($qualification)
    {
        if ($qualification == 'diploma')
            return 'Diploma';
        elseif ($qualification == 'bachelors')
            return 'Bachelors';
        elseif ($qualification == 'master')
            return 'Master';
        elseif ($qualification == 'doctora')
            return 'Doctora';
    }

}
