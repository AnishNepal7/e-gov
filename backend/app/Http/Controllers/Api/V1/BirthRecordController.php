<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
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
}
