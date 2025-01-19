<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreEmployeeRequest;
use App\Http\Requests\V1\UpdateEmployeeRequest;
use App\Http\Resources\V1\EmployeeCollection;
use App\Http\Resources\V1\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;

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
        return new EmployeeResource(Employee::create($request->all()));

    }
    public function update(UpdateEmployeeRequest $request,Employee $employee)
    {
        $employee->update($request->all());

    }
    public function destroy()
    {
        
    }
}
