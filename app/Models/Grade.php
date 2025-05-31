<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $guarded = [];
    function stage()
    {
        return $this->belongsTo(Stage::class);
    }
    public static function getStatusByCode($status)
    {
        // return filter_var($status, FILTER_VALIDATE_BOOLEAN) ? 'active' : 'inactive';

        if ($status == 1) {
            return 'active';
        }
        return 'inactive';
    }
}
