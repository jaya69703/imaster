<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overtimes extends Model
{
    use HasFactory;
    protected $table = 'overtimes';
    protected $fillable = [
        'user_id',
        'overtime_proof',
        'overtime_date',
        'overtime_start',
        'overtime_end',
        'overtime_desc',
        'overtime_stat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
