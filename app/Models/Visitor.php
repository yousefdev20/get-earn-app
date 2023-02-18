<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = ['refereed_by', 'times'];

    public function watchDetails(): HasMany
    {
        return $this->hasMany(VisitDetails::class);
    }


}
