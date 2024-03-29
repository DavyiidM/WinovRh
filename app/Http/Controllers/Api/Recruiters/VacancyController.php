<?php

namespace App\Http\Controllers\Api\Recruiters;

use App\Enums\VacancyStatusEnum;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVacancyRequest;
use App\Http\Requests\UpdateVacancyRequest;
use App\Http\Resources\VacancyResource;
use App\Models\Vacancy;
use App\Models\VacancyCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\QueryBuilder\QueryBuilder;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacancies = QueryBuilder::for(Vacancy::class)
            ->allowedIncludes([
                'candidates',
                'categories',
                'recruiter',
                'status',
                'historic',
            ])->paginate(
                perPage: \request('per_page', 15),
                page: \request('page', 1)
            )->appends(\request()->query());
        //dd($vacancies);
        return VacancyResource::collection($vacancies)->response()->getData(true);
    }

    public function indexCandidate()
    {
        $vacancies = QueryBuilder::for(Vacancy::class)
            ->where('status', true)
            ->allowedIncludes([
                'candidates',
                'categories',
                'recruiter',
                'status',
                'historic',
            ])->paginate(
                perPage: \request('per_page', 15),
                page: \request('page', 1)
            )->appends(\request()->query());
        //dd($vacancies);
        return VacancyResource::collection($vacancies)->response()->getData(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVacancyRequest $request)
    {

        $vacancy = Vacancy::create([
            ...$request->validated(),
            'slug' => Str::slug($request->validated('title')),
            'status' => true,
        ]);

        VacancyCategory::create([
            'vacancy_id' => $vacancy->id,
            'category_id' => $request->input('category_id')
        ]);

        return (new VacancyResource($vacancy))->response()->setStatusCode(201);
    }
    
    public function updateStatus(Request $request, $id)
    {
        $vacancy = Vacancy::query()->findOr($id, fn () => throw new NotFoundException());

        $vacancy->update([
            'status'=>$request->input('status'),
        ]);

        $vacancy->refresh();

        return (new VacancyResource($vacancy))->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vacancy = Vacancy::findOr($id, fn () => throw new NotFoundException());

        return (new VacancyResource($vacancy))->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVacancyRequest $request, string $id)
    {
        $vacancy = Vacancy::query()->findOr($id, fn () => throw new NotFoundException());

        $vacancy->update($request->validated());

        $vacancy->refresh();

        VacancyCategory::where('vacancy_id', $id)
            ->update([
                'category_id' => $request->input('category_id')
            ]);



        return (new VacancyResource($vacancy))->response();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vacancy = Vacancy::query()
            ->whereDoesntHave('candidates')
            ->findOr($id, fn () => throw new NotFoundException("Vacancy Not Found!"));

        $vacancy->delete();

        return response(content: '', status: 204);
    }
}
