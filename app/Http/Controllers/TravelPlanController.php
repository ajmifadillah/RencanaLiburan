<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\TravelPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TravelPlanController extends Controller
{
    public function index(Destination $destination)
    {
        if ($destination->user_id !== Auth::id()) {
            abort(403);
        }

        $travelPlans = $destination->travelPlans()
            ->orderBy('day')
            ->orderBy('time')
            ->get();

        return view('travel_plans.index', compact('destination', 'travelPlans'));
    }

    public function create(Destination $destination)
    {
        if ($destination->user_id !== Auth::id()) {
            abort(403);
        }

        return view('travel_plans.create', compact('destination'));
    }

    public function store(Request $request, Destination $destination)
    {
        if ($destination->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'day' => 'required|integer|min:1',
            'time' => 'required',
            'activity' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        TravelPlan::create([
            'destination_id' => $destination->id,
            'day' => $request->day,
            'time' => $request->time,
            'activity' => $request->activity,
            'location' => $request->location,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('travel-plans.index', $destination)
            ->with('success', 'Rencana liburan berhasil ditambahkan.');
    }

    public function edit(TravelPlan $travelPlan)
    {
        if ($travelPlan->destination->user_id !== Auth::id()) {
            abort(403);
        }

        return view('travel_plans.edit', compact('travelPlan'));
    }

    public function update(Request $request, TravelPlan $travelPlan)
    {
        if ($travelPlan->destination->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'day' => 'required|integer|min:1',
            'time' => 'required',
            'activity' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $travelPlan->update([
            'day' => $request->day,
            'time' => $request->time,
            'activity' => $request->activity,
            'location' => $request->location,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('travel-plans.index', $travelPlan->destination_id)
            ->with('success', 'Rencana liburan berhasil diperbarui.');
    }

    public function destroy(TravelPlan $travelPlan)
    {
        if ($travelPlan->destination->user_id !== Auth::id()) {
            abort(403);
        }

        $destinationId = $travelPlan->destination_id;

        $travelPlan->delete();

        return redirect()
            ->route('travel-plans.index', $destinationId)
            ->with('success', 'Rencana liburan berhasil dihapus.');
    }
}