<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Relations\HashMany;

class Course extends Model
{
    protected $fillable = ["name"];
    public function students(): HasMany {
        return $this->hasMany(Student::class);
    }
}
