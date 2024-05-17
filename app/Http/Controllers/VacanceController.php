<?php

namespace App\Http\Controllers;

use App\Models\Vacance;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class VacanceController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $search = $request->input('search');
        $date = $request->input('date');

        $vacances = Vacance::query()
            ->when($search, function ($query, $search) {
                return $query->whereHas('employee', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                });
            })
            ->when($date, function ($query, $date) {
                return $query->whereDate('start_date', $date);
            })
            ->latest()
            ->paginate(8);

        return view('vacances.index', compact('vacances'));
    }
    public function create()
    {
        $employees = Employee::all();
        return view('vacances.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string',
        ]);

        $vacance = Vacance::create($validatedData);

        return redirect()->route('vacances.show', $vacance->id);
    }
    public function show($id)
    {
        $vacance = Vacance::findOrFail($id);
        return view('vacances.show', compact('vacance'));
    }
    public function edit($id)
    {
        $vacance = Vacance::findOrFail($id);
        $employees = Employee::all();
        return view('vacances.edit', compact('vacance', 'employees'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'reason' => 'required|string',
        ]);

        $vacance = Vacance::findOrFail($id);
        $vacance->update($validatedData);

        return redirect()->route('vacances.show', $vacance->id);
    }
    public function destroy($id)
    {
        $vacance = Vacance::findOrFail($id);
        $vacance->delete();

        return redirect()->route('vacances.index');
    }
    public function history()
    {

        $vacances = Vacance::paginate(10);
        return view('vacances.history', compact('vacances'));
    }
}
