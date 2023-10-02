<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CandidateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'vacancies' => $this->whenLoaded(
                'vacancies',
                fn() => VacancyResource::collection($this->vacancies)
            ),
            'email' => $this->email,
            'password' => $this->password,
            'linkedin' => $this->linkedin, 
            'github' => $this->github,
        ];
    }
}
