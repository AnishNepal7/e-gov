<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreProjectRequest;
use App\Http\Requests\V1\UpdateProjectRequest;
use App\Http\Resources\V1\ProjectCollection;
use App\Http\Resources\V1\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function index()
    {
        return new ProjectCollection(Project::paginate(10));

    }
    public function show(Project $project)
    {
        return new ProjectResource($project);

    }
    public function store(StoreProjectRequest $request)
    {
        return new ProjectResource(Project::create($request->all()));

    }
    public function update(UpdateProjectRequest $request,Project $project)
    {
       $project->update($request->all());

    }
    public function destroy(Project $project)
    {
        $project->delete();

    // Return a 200 OK response with a message
    return response()->json([
        'message' => 'Death record deleted successfully.',
    ], 200);
        
    }
}
