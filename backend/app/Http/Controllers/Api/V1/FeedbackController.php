<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\FeedbackCollection;
use App\Http\Resources\V1\FeedbackResource;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    //
    public function index()
    {
        return new FeedbackCollection(Feedback::paginate(10));

    }
    public function show(Feedback $feedback)
    {
        return new FeedbackResource($feedback);
        
    }
}
