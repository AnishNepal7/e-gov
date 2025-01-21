<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreNoticeRequest;
use App\Http\Requests\V1\UpdateNoticeRequest;
use App\Http\Resources\V1\NoticeCollection;
use App\Http\Resources\V1\NoticeResource;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    //
    public function index()
    {
        return new NoticeCollection(Notice::paginate(10));

    }
    public function show(Notice $notice)
    {
        return new NoticeResource($notice);
        
    }
    public function store(StoreNoticeRequest $request)
    {
        return new NoticeResource(Notice::create($request->all()));

    }
    public function update(UpdateNoticeRequest $request,Notice $notice)
    {
        $notice->update($request->all());

    }
    public function destroy(Notice $notice)
    {
        $notice->delete();

    // Return a 200 OK response with a message
    return response()->json([
        'message' => 'Death record deleted successfully.',
    ], 200);
        
    }
}
