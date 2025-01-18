<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
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
}
