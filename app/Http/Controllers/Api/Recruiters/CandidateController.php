<?php

namespace App\Http\Controllers\Api\Recruiters;

use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Resources\CandidateResource;
use Spatie\QueryBuilder\QueryBuilder;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidates = QueryBuilder::for(Candidate::class)
            ->allowedIncludes('vacancies')
            ->paginate(
                perPage: \request('per_page', 15),
                page: \request('page', 1)
            )->appends(\request()->query());

        return CandidateResource::collection($candidates)->response()->getData(true);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $candidate = Candidate::findOr($id, fn() => throw new NotFoundException('Resource not Found'));

        return (new CandidateResource($candidate))->response();
    }

    public function store(Request $request)
    {
        // $data = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email'
        // ]);
        $data = $request->all();

        $candidate = Candidate::create($data);

        return response()->json($candidate, 201);
    }
    
}
