<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreBirthRequest;
use App\Http\Requests\V1\UpdateBirthRequest;
use App\Http\Resources\V1\BirthRecordCollection;
use App\Http\Resources\V1\BirthRecordResource;
use App\Models\BirthRecord;
use Illuminate\Http\Request;

class BirthRecordController extends Controller
{
    //
    public function index()
    {
        return new BirthRecordCollection(BirthRecord::paginate(10));

    }
    public function show(BirthRecord $birthRecord)
    {
        
        return new BirthRecordResource($birthRecord);
    }
    public function store(StoreBirthRequest $request)
    {
        return new BirthRecordResource(BirthRecord::create($request->all()));

    }
    public function update(UpdateBirthRequest $request,BirthRecord $birthRecord)
    {
        $birthRecord->update($request->all());

    }
    public function destroy(BirthRecord $birthRecord)
    {
        $birthRecord->delete();
        return response()->json([
            'message' => 'Birth record deleted successfully.',
        ], 200);

    }
}
