<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitDetails extends Model
{
    use HasFactory;

    protected $fillable = ['visitor_id', 'ip_address', 'page_name', 'spent_time', 'coming_from'];
}
