<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacancyCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'vacancy_id',
        'category_id',
    ];

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
