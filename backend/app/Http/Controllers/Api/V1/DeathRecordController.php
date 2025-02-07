<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreDeathRequest;
use App\Http\Requests\V1\UpdateDeathRequest;
use App\Http\Resources\V1\DeathRecordCollection;
use App\Http\Resources\V1\DeathRecordResource;
use App\Models\DeathRecord;
use Illuminate\Http\Request;

class DeathRecordController extends Controller
{
    //
    public function index()
    {
        return new DeathRecordCollection(DeathRecord::paginate(10));


    }
    public function show(DeathRecord $deathRecord)
    {
        if (!$deathRecord) {
            return response()->json(['message' => 'Record not found'], 404);
        }
    
        return new DeathRecordResource($deathRecord);
        //  return new DeathRecordResource($deathRecord);
        
    }
    public function store(StoreDeathRequest $request)
    {
        return new DeathRecordResource(DeathRecord::create($request->all()));

    }
    public function update(UpdateDeathRequest $request,DeathRecord $deathRecord)
    {
        $deathRecord->update($request->all());

    }
    public function destroy(DeathRecord $deathRecord)
    {
        $deathRecord->delete();

    // Return a 200 OK response with a message
    return response()->json([
        'message' => 'Death record deleted successfully.',
    ], 200);
        
    }
}
