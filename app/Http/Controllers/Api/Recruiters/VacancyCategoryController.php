<?php

namespace App\Http\Controllers\Api\Recruiters;

use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\VacancyCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyCategoryController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(VacancyCategoryRequest $request, $vacancyId)
    {
        $vacancy = Vacancy::query()
            ->whereDoesntHave('categories', function ($categories) use ($request) {
                $categories->where('categories.id', $request->validated('category_id'));
            })
            ->findOr($vacancyId, fn() => throw  new NotFoundException());

        $vacancy->categories()->attach(['category_id' => $request->validated('category_id')]);

        return response()->json([
            'message' => 'It Work!',
        ], 201);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $vacancyId, string $categoryId)
    {
        $vacancy = Vacancy::query()
            ->whereHas('categories', function ($categories) use ($categoryId) {
                $categories->where('categories.id', $categoryId);
            })
            ->findOr($vacancyId, fn() => throw  new NotFoundException());

        $vacancy->categories()->detach(['category_id' => $categoryId]);

        return response()->json([
            'message' => 'It Work!',
        ], 201);
    }
}
