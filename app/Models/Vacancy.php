<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'description',
        'expires_at',
    ];

    protected $attributes = [
        'description' => null,
    ];

    protected $casts = [
        'expires_at' => 'date'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'vacancy_categories');
    }

    public function recruiter()
    {
        return $this->belongsTo(Recruiter::class);
    }

    public function status()
    {
        return $this->hasOne(VacancyStatus::class)->latestOfMany();
    }

    public function historic()
    {
        return $this->hasMany(VacancyStatus::class);
    }

    public function candidates()
    {
        return $this->belongsToMany(Candidate::class, 'vacancy_candidates');
    }

}
