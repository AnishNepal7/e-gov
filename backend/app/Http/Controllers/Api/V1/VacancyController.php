<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreVacancyRequest;
use App\Http\Requests\V1\UpdateVacancyRequest;
use App\Http\Resources\V1\VacancyCollection;
use App\Http\Resources\V1\VacancyResource;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    //

     /**
     * @OA\Get(
     *     path="/api/v1/vacancies",
     *     tags={"Vacancies"},
     *     summary="List all vacancies",
     *     description="Fetch a paginated list of vacancies.",
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="Page number for pagination",
     *         required=false,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Vacancy")),
     *             @OA\Property(property="links", type="object"),
     *             @OA\Property(property="meta", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error"
     *     )
     * )
     */
    public function index()
    {
        return new VacancyCollection(Vacancy::paginate(10));
    }
     /**
     * @OA\Get(
     *     path="/api/v1/vacancies/{id}",
     *     tags={"Vacancies"},
     *     summary="Get a single vacancy",
     *     description="Fetch details of a specific vacancy by ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the vacancy",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Vacancy")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Vacancy not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Vacancy not found.")
     *         )
     *     )
     * )
     */
    public function show(Vacancy $vacancy)
    {
        return new VacancyResource($vacancy);

    }
    public function store(StoreVacancyRequest $request)
    {
        return new VacancyResource(Vacancy::create($request->all()));

    }
    public function update(UpdateVacancyRequest $request,Vacancy $vacancy)
    {
        // return "hi";
        $vacancy->update($request->all());

    }
    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();

    // Return a 200 OK response with a message
    return response()->json([
        'message' => 'Death record deleted successfully.',
    ], 200);
        
    }

}
