<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacancyCandidate extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'vacancy_id',
        'candidate_id',
    ];
    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }
    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }


}
