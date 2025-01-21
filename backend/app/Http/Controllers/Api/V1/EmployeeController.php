<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreEmployeeRequest;
use App\Http\Requests\V1\UpdateEmployeeRequest;
use App\Http\Resources\V1\EmployeeCollection;
use App\Http\Resources\V1\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    //
    public function index()
    {
        return new EmployeeCollection(Employee::paginate(10));

    }

    public function show(Employee $employee)
    {
        return new EmployeeResource($employee);
    }

    public function store(StoreEmployeeRequest $request)
    {
        $data=$request->all();
      
        if ($request->hasFile('image')) {
            $originalName = $request->file('image')->getClientOriginalName();
            $imageName = time() . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.' . $request->file('image')->extension();

            // Store image in 'storage/app/public/employees' and get the file path
            
            $imagePath = $request->file('image')->storeAs('employees', $imageName, 'public');

            // Store the relative path (storage/employees/filename.png) in the database
            $data['image'] = 'storage/' . $imagePath;
        }
        return new EmployeeResource(Employee::create($data));

    }

    public function update(UpdateEmployeeRequest $request,Employee $employee)
    {

        $data = $request->all();

    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($employee->image) {
            $oldImagePath = str_replace('storage/', '', $employee->image); // remove 'storage/' to get the actual file path
            Storage::disk('public')->delete($oldImagePath); // delete the old image
        }
        $originalName = $request->file('image')->getClientOriginalName();
        $imageName = time() . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.' . $request->file('image')->extension();

        // Store the new image and get the file path
        $imagePath = $request->file('image')->storeAs('employees', $imageName, 'public');

        // Store the relative path in the database
        $data['image'] = 'storage/' . $imagePath;
    }

        $employee->update($data);

    }

    public function destroy(Employee $employee)
    {
        if ($employee->image) {
            // Remove 'storage/' from the image path to get the actual file path
            $imagePath = str_replace('storage/', '', $employee->image);
    
            // Delete the image from storage
            Storage::disk('public')->delete($imagePath);
        }
    
        // Delete the employee record
        $employee->delete();
    
        return response()->json(['message' => 'Employee deleted successfully']);
        
    }
}
