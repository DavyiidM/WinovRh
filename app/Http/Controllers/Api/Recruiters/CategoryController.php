<?php

namespace App\Http\Controllers\Api\Recruiters;

use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = QueryBuilder::for(Category::class)
            ->allowedIncludes('vacancies')
            ->paginate(
                perPage: \request('per_page', 15),
                page: \request('page', 1)
            )->appends(\request()->query());

        return CategoryResource::collection($categories)->response()->getData(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->validated());

        return (new CategoryResource($category))->response()->setStatusCode(201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOr($id, fn() => response()->json(['message' => 'Not Found'], 404));

        return (new CategoryResource($category))->response();

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $category = Category::query()->findOr($id, fn() => response()->json(['message' => 'Not Found'], 404));

        $category->update($request->validated());

        $category->refresh();

        return (new CategoryResource($category))->response();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::query()
            ->whereDoesntHave('vacancies')
            ->findOr($id, fn() => throw new NotFoundException("Category Not Found!"));

        $category->delete();

        return response(content: '', status: 204);
    }
}
