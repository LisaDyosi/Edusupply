<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Allocation;
use App\Models\Stationery;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AllocationController extends Controller
{
    
    public function index()
    {
        $allocations = Allocation::with(['stationery', 'school', 'contractor'])->get();
        return view('department.allocations', compact('allocations'));
    }

    public function create()
    {
        $stationeries = Stationery::all();
        $schools = User::where('role', 'school')->get();
        $contractors = User::where('role', 'contractor')->get();

        return view('department.create-allocation', compact('stationeries', 'schools', 'contractors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'stationery_id' => 'required|exists:stationeries,id',
            'school_id' => 'required|exists:users,id',
            'contractor_id' => 'required|exists:users,id',
            'quantity' => 'required|integer|min:1',
        ]);

        Allocation::create([
            'stationery_id' => $request->stationery_id,
            'school_id' => $request->school_id,
            'contractor_id' => $request->contractor_id,
            'quantity' => $request->quantity,
            'status' => 'pending',
        ]);

        return redirect()->route('department.allocations')->with('success', 'Stationery allocated successfully');
    }

    public function myDeliveries()
    {

    $deliveries = Auth::user()->deliveries()->with(['school', 'stationery'])->get();

    return view('contractor.my-deliveries', compact('deliveries'));
    }

    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:in_transit,delivered',
    ]);

    $allocation = Allocation::findOrFail($id);

    if (Auth::user()->role === 'contractor') {
        if ($request->status === 'in_transit') {
            $code = rand(10000, 99999);
            $allocation->update([
                'status' => 'in_transit',
                'confirmation_code' => $code,
                'status_updated_at' => now(),
            ]);
        } elseif ($request->status === 'delivered') {
            
            return back()->withErrors(['error' => 'Use the confirmation code to mark as delivered.']);
        }

        return back()->with('success', 'Delivery status updated');
    }

    return back()->withErrors(['error' => 'Unauthorized action']);
}


public function confirmDelivery(Request $request, $id)
{
    $allocation = Allocation::findOrFail($id);

    if (Auth::user()->role === 'school' && $allocation->status === 'delivered') {
        $request->validate([
            'delivered_quantity' => 'required|integer|min:0'
        ]);

        $allocation->update([
            'status' => 'confirmed',
            'delivered_quantity' => $request->delivered_quantity,
            'status_updated_at' => now()
        ]);

        return back()->with('success', 'Delivery confirmed and quantity recorded.');
    }

    return back()->withErrors(['error' => 'Unauthorized action or invalid status.']);
}


public function confirmWithCode(Request $request, $id)
{
    $request->validate([
        'confirmation_code' => 'required|string',
    ]);

    $allocation = Allocation::findOrFail($id);

    if (Auth::user()->role === 'contractor') {
        if ($allocation->confirmation_code === $request->confirmation_code) {
            $allocation->update(['status' => 'delivered']);
            return back()->with('success', 'Package marked as delivered');
        } else {
            return back()->withErrors(['error' => 'Invalid confirmation code']);
        }
    }

    return back()->withErrors(['error' => 'Unauthorized action']);
}

public function receivedDeliveries()
{
    $received = Auth::user()->allocations()
        ->where('status', 'delivered')
        ->with('stationery', 'contractor')
        ->get();

    return view('school.received', compact('received'));
}

public function logDeliveryForm(Allocation $allocation)
{
    return view('school.log-delivery', compact('allocation'));
}

public function saveDelivery(Request $request, Allocation $allocation)
{
    $request->validate([
        'delivered_quantity' => 'required|integer|min:0',
    ]);

    $discrepancy = $allocation->quantity - $request->delivered_quantity;

    $allocation->discrepancy = $discrepancy;
    $allocation->discrepancy_status = 'Pending';
    $allocation->save();

    return redirect()->route('school.received')->with('success', 'Delivery logged and discrepancy calculated.');
}


public function updateDiscrepancyStatus(Request $request, Allocation $allocation)
{
    $request->validate([
        'discrepancy_status' => 'required|in:Pending,Attending,Fixed',
    ]);

    $allocation->discrepancy_status = $request->discrepancy_status;
    $allocation->save();

    return back()->with('success', 'Discrepancy status updated.');
}
public function logDiscrepancy(Request $request, Allocation $allocation)
{
    $request->validate([
        'discrepancy' => 'required|integer|min:0',
    ]);

    $allocation->discrepancy = $request->discrepancy;
    $allocation->discrepancy_status = 'pending';  // Default to pending
    $allocation->save();

    return redirect()->back()->with('success', 'Discrepancy recorded successfully.');
}


}


