<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('destinations.index', compact('destinations'));
    }

    public function create()
    {
        return view('destinations.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'title' => 'required|string|max:255',
        'departure_date' => 'required|date',
        'budget' => 'required|numeric|min:0',
        'duration' => 'required|integer|min:1',
        'status' => 'required|in:belum,tercapai',
    ]);

    $photoPath = null;

    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('destinations', 'public');
    }

    Destination::create([
        'user_id' => Auth::id(),
        'photo' => $photoPath,
        'title' => $request->title,
        'departure_date' => $request->departure_date,
        'budget' => $request->budget,
        'duration' => $request->duration,
        'status' => $request->status,
    ]);

    return redirect()
        ->route('destinations.index')
        ->with('success', 'Destinasi berhasil ditambahkan.');
}

    public function show(Destination $destination)
{
    if ($destination->user_id !== Auth::id()) {
        abort(403);
    }

    $destination->load('travelPlans');

    return view('destinations.show', compact('destination'));
}

    public function edit(Destination $destination)
{
    if ($destination->user_id !== Auth::id()) {
        abort(403);
    }

    return view('destinations.edit', compact('destination'));
}

    public function update(Request $request, Destination $destination)
{
    if ($destination->user_id !== Auth::id()) {
        abort(403);
    }

    $request->validate([
        'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'title' => 'required|string|max:255',
        'departure_date' => 'required|date',
        'budget' => 'required|numeric|min:0',
        'duration' => 'required|integer|min:1',
        'status' => 'required|in:belum,tercapai',
    ]);

    $photoPath = $destination->photo;

    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('destinations', 'public');
    }

    $destination->update([
        'photo' => $photoPath,
        'title' => $request->title,
        'departure_date' => $request->departure_date,
        'budget' => $request->budget,
        'duration' => $request->duration,
        'status' => $request->status,
    ]);

    return redirect()
        ->route('destinations.index')
        ->with('success', 'Destinasi berhasil diperbarui.');
}

    public function destroy(Destination $destination)
{
    if ($destination->user_id !== Auth::id()) {
        abort(403);
    }

    $destination->delete();

    return redirect()
        ->route('destinations.index')
        ->with('success', 'Destinasi berhasil dihapus.');
}
}