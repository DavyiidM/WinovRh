<?php

namespace App\Http\Controllers\Api\Recruiters;

use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Resources\CandidateResource;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

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
        $candidate = Candidate::findOr($id, fn () => throw new NotFoundException('Resource not Found'));

        return (new CandidateResource($candidate))->response();
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $validator = Validator::make($request->all(), [
            'resume' => 'required|mimes:pdf|max:4096',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
        }

        $data = $request->all();

        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $fileName = time() . '_' . $file->getClientOriginalName();

            $file->storeAs('public', $fileName);
        }

        $data['resume'] = $fileName;

        $candidate = Candidate::create($data);

        return response()->json($candidate, 201);
    }

    public function viewResume($filename)
    {
        $path = storage_path('app/public/' . $filename);

        if (!Storage::exists("public/{$filename}")) {
            abort(404);
        }

        $file = Storage::get("public/{$filename}");
        $type = Storage::mimeType("public/{$filename}");

        return (new Response($file, 200))
            ->header('Content-Type', $type);
    }
}
