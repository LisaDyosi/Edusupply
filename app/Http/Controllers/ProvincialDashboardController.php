<?php

namespace App\Http\Controllers;

use App\Models\Allocation;
use App\Models\Stationery;
use App\Models\User;
use Illuminate\Http\Request;

class ProvincialDashboardController extends Controller
{
    public function index(Request $request)
    {
    $query = User::where('role', 'school');

    if ($request->has('search') && $request->search != '') {
        $query->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('email', 'like', '%' . $request->search . '%');
    }

    $schools = $query->get();

    return view('department.schools.index', compact('schools'));
    }

    public function show($schoolId)
    {
        $school = User::where('role', 'school')->findOrFail($schoolId);
        $allocations = Allocation::where('school_id', $schoolId)
            ->with(['stationery', 'contractor'])
            ->get();

        return view('department.schools.show', compact('school', 'allocations'));
    }

    public function createAllocation($schoolId)
    {
        $school = User::where('role', 'school')->findOrFail($schoolId);
        $stationeries = Stationery::all();
        $contractors = User::where('role', 'contractor')->get();

        return view('department.schools.create-allocation', compact('school', 'stationeries', 'contractors'));
    }

    public function storeAllocation(Request $request, $schoolId)
    {
        $request->validate([
            'stationery_id' => 'required|exists:stationeries,id',
            'contractor_id' => 'required|exists:users,id',
            'quantity' => 'required|integer|min:1',
        ]);

        Allocation::create([
            'stationery_id' => $request->stationery_id,
            'school_id' => $schoolId,
            'contractor_id' => $request->contractor_id,
            'quantity' => $request->quantity,
            'status' => 'pending',
        ]);

        return redirect()->route('department.schools.show', $schoolId)->with('success', 'Allocation created successfully.');
    }

    public function createSchool()
    {
        return view('department.schools.create-school');
    }

    public function storeSchool(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'email' => 'required|email|unique:users,email',
        ]);

        User::create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'password' => bcrypt('school'), 
            'role' => 'school',
        ]);

        return redirect()->route('department.schools.index')->with('success', 'School added successfully.');
    }

    public function contractorsIndex(Request $request)
    {
        $query = User::where('role', 'contractor');
    
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
        }
    
        $contractors = $query->get();
    
        return view('department.contractors.index', compact('contractors'));
    }

public function showContractor($contractorId)
{
    $contractor = User::where('role', 'contractor')->findOrFail($contractorId);
    $allocations = Allocation::where('contractor_id', $contractorId)
        ->with(['stationery', 'school'])
        ->get();

    return view('department.contractors.show', compact('contractor', 'allocations'));
}

public function createContractor()
{
    return view('department.contractors.create-contractor');
}

public function storeContractor(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt('contractor'), 
        'role' => 'contractor',
    ]);

    return redirect()->route('department.contractors.index')->with('success', 'Contractor added successfully.');
}

public function editSchool($schoolId)
{
    $school = User::where('role', 'school')->findOrFail($schoolId);
    return view('department.schools.edit-school', compact('school'));
}

public function updateSchool(Request $request, $schoolId)
{
    $school = User::where('role', 'school')->findOrFail($schoolId);

    $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:500',
        'email' => 'required|email|unique:users,email,'.$school->id,
    ]);

    $school->update([
        'name' => $request->name,
        'address' => $request->address,
        'email' => $request->email,
    ]);

    return redirect()->route('department.schools.index')->with('success', 'School updated successfully.');
}


public function destroySchool($schoolId)
{
    $school = User::where('role', 'school')->findOrFail($schoolId);
    $school->delete();

    return redirect()->route('department.schools.index')->with('success', 'School deleted successfully.');
}

public function editContractor($contractorId)
{
    $contractor = User::where('role', 'contractor')->findOrFail($contractorId);
    return view('department.contractors.edit-contractor', compact('contractor'));
}

public function updateContractor(Request $request, $contractorId)
{
    $contractor = User::where('role', 'contractor')->findOrFail($contractorId);

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,'.$contractor->id,
    ]);

    $contractor->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    return redirect()->route('department.contractors.index')->with('success', 'Contractor updated successfully.');
}

public function destroyContractor($contractorId)
{
    $contractor = User::where('role', 'contractor')->findOrFail($contractorId);
    $contractor->delete();

    return redirect()->route('department.contractors.index')->with('success', 'Contractor deleted successfully.');
}

}
