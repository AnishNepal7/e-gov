<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreFeedbackRequest;
use App\Http\Requests\V1\UpdateFeedbackRequest;
use App\Http\Resources\V1\FeedbackCollection;
use App\Http\Resources\V1\FeedbackResource;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function store(StoreFeedbackRequest $request)
    {
        $data = $request->all();

        // Check if there's an image file in the request
        if ($request->hasFile('image')) {
            // Get the original name of the uploaded image
            $originalName = $request->file('image')->getClientOriginalName();
    
            // Generate a new unique name for the image using timestamp and original file name
            $imageName = time() . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.' . $request->file('image')->extension();
    
            // Store the image with the generated name in the 'feedbacks' folder in the public disk
            $imagePath = $request->file('image')->storeAs('feedbacks', $imageName, 'public');
    
            // Store the relative path (storage/feedbacks/filename.png) in the database
            $data['image'] = 'storage/' . $imagePath;
        }
    
        // Create a new Feedback record and return a resource
        return new FeedbackResource(Feedback::create($data));
        // return new FeedbackResource(Feedback::create($request->all()));

    }
    public function update(UpdateFeedbackRequest $request,Feedback $feedback)
    {
        //currently no need to update feedback
        $data = $request->all();

    // Check if there's a new image in the request
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($feedback->image) {
            // Remove 'storage/' from the path to get the actual file path
            $oldImagePath = str_replace('storage/', '', $feedback->image);
            
            // Delete the old image from storage
            Storage::disk('public')->delete($oldImagePath);
        }

        // Get the original file name of the new image
        $originalName = $request->file('image')->getClientOriginalName();

        // Generate a new file name with a timestamp and original name (excluding extension)
        $imageName = time() . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.' . $request->file('image')->extension();

        // Store the new image in the 'employees' folder and get the file path
        $imagePath = $request->file('image')->storeAs('feedbacks', $imageName, 'public');

        // Store the relative path in the database
        $data['image'] = 'storage/' . $imagePath;
    }

    // Update the feedback record with the new data
    $feedback->update($data);

    }
    public function destroy()
    {
        
    }
}
