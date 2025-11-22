<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Grade;
class Karyawan extends Model
{
    use HasFactory;
    
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
    
}
