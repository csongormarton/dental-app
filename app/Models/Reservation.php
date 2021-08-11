<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    const DAYS = ['mo', 'tu', 'we', 'th', 'fr', 'sa', 'su'];
    const RECURRING = ['none', 'every_week', 'even_week', 'odd_week'];

    protected $fillable = ['client_name', 'start', 'end', 'recurring', 'day', 'duration'];

    protected $dates = [
        'start',
        'end',
    ];
}
