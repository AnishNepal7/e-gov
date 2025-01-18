<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreDeathRequest;
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
    public function update()
    {

    }
    public function destroy()
    {
        
    }
}
