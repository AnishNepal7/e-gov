<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
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
}
