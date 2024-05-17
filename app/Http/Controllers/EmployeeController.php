<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $employees = Employee::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'LIKE', "%{$search}%");
            })
            ->with('department')->latest()
            ->paginate(8);

        return view('employees.index', compact('employees'));
    }
    public function create()
    {
        $departments = Department::all();
        return view('employees.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:employees',
            'department_id' => 'required|exists:departments,id',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'phone' => 'required|string',
        ]);

        $employee = new Employee();
        $employee->name = $validatedData['name'];
        $employee->email = $validatedData['email'];
        $employee->department_id = $validatedData['department_id'];
        $employee->phone = $validatedData['phone'];


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $employee->image = $imageName;
        }


        $employee->save();

        Session::flash('success', 'Employee created successfully!');

        return redirect()->route('employees.index');
    }



    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();

        return view('employees.edit', compact('employee', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:employees,email,' . $id,
            'department_id' => 'required|exists:departments,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'phone' => 'nullable|string',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->name = $validatedData['name'];
        $employee->email = $validatedData['email'];
        $employee->department_id = $validatedData['department_id'];
        $employee->phone = $validatedData['phone'];

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($employee->image) {
                Storage::delete($employee->image);
            }
            $imagePath = $request->file('image');
            $employee->image = $imagePath;
        }

        $employee->save();

        Session::flash('success', 'Employee updated successfully!');

        return redirect()->route('employees.index');
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        if ($employee->image) {
            Storage::delete($employee->image);
        }
        $employee->delete();

        Session::flash('success', 'Employee deleted successfully!');

        return redirect()->route('employees.index');
    }
}
