<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Candidate extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'linkedin',
        'github',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $attributes = [
        'password' => null,
        'linkedin' => null,
        'github' => null,
    ];

    public function resume()
    {
        return $this->hasOne(Resume::class)->latestOfMany();
    }

    public function resumes()
    {
        return $this->hasMany(Resume::class);
    }

    public function vacancies()
    {
        return $this->belongsToMany(Vacancy::class, 'vacancy_candidates')
            ->orderBy('vacancy_candidates.created_at', 'desc');
    }

    public function telephones()
    {
        return $this->belongsToMany(Telephone::class, 'candidate_telephones');
    }
}
