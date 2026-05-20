<?php

namespace App\Http\Controllers;

use App\Models\Airdrop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AirdropController extends Controller
{
    public function index()
    {
        $airdrops = Airdrop::orderBy('created_at', 'desc')->get();
        $defaultFilter = 'daily';
        return view('airdrop.index', compact('airdrops', 'defaultFilter'));
    }

    public function create()
    {
        // Only admin can create airdrop
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('airdrop.index')->with('error', 'Unauthorized');
        }

        return view('airdrop.create');
    }

    public function store(Request $request)
    {
        // Only admin can create airdrop
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('airdrop.index')->with('error', 'Unauthorized');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|url',
            'chain' => 'required|string|max:255',
            'task_type' => 'nullable|string|in:testnet,retro,node,mining,social_task',
            'discord_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'telegram_link' => 'nullable|url',
            'wallet_address' => 'nullable|string|max:255',
            'private_key' => 'nullable|string',
            'notes' => 'nullable|string',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'description' => 'nullable|string',
        ]);

        $data = $request->only(['name', 'link', 'chain', 'task_type', 'discord_link', 'twitter_link', 'telegram_link', 'wallet_address', 'private_key', 'notes', 'description']);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoPath = $logo->store('airdrops', 'public');
            $data['logo'] = $logoPath;
        }

        Airdrop::create($data);

        return redirect()->route('airdrop.index')->with('success', 'Airdrop added successfully!');
    }

    public function show($id)
    {
        $airdrop = Airdrop::findOrFail($id);
        return view('airdrop.show', compact('airdrop'));
    }

    public function edit($id)
    {
        // Only admin can edit airdrop
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('airdrop.index')->with('error', 'Unauthorized');
        }

        $airdrop = Airdrop::findOrFail($id);
        return view('airdrop.edit', compact('airdrop'));
    }

    public function update(Request $request, $id)
    {
        // Only admin can update airdrop
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('airdrop.index')->with('error', 'Unauthorized');
        }

        $airdrop = Airdrop::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|url',
            'chain' => 'required|string|max:255',
            'task_type' => 'nullable|string|in:testnet,retro,node,mining,social_task',
            'discord_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'telegram_link' => 'nullable|url',
            'wallet_address' => 'nullable|string|max:255',
            'private_key' => 'nullable|string',
            'notes' => 'nullable|string',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'description' => 'nullable|string',
        ]);

        $data = $request->only(['name', 'link', 'chain', 'task_type', 'discord_link', 'twitter_link', 'telegram_link', 'wallet_address', 'private_key', 'notes', 'description']);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo
            if ($airdrop->logo) {
                Storage::disk('public')->delete($airdrop->logo);
            }
            $logo = $request->file('logo');
            $logoPath = $logo->store('airdrops', 'public');
            $data['logo'] = $logoPath;
        }

        $airdrop->update($data);

        return redirect()->route('airdrop.index')->with('success', 'Airdrop updated successfully!');
    }

    public function destroy($id)
    {
        // Only admin can delete airdrop
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('airdrop.index')->with('error', 'Unauthorized');
        }

        $airdrop = Airdrop::findOrFail($id);

        // Delete logo
        if ($airdrop->logo) {
            Storage::disk('public')->delete($airdrop->logo);
        }

        $airdrop->delete();

        return redirect()->route('airdrop.index')->with('success', 'Airdrop deleted successfully!');
    }

    public function claim(Request $request, $id)
    {
        $airdrop = Airdrop::findOrFail($id);
        return back()->with('success', 'Airdrop claimed successfully!');
    }

    public function updateStatus(Request $request, $id)
    {
        // Only admin can update status
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('airdrop.show', $id)->with('error', 'Unauthorized');
        }

        $request->validate([
            'status' => 'required|in:daily,active,eligible,not_eligible,hold,waitlist',
        ]);

        $airdrop = Airdrop::findOrFail($id);
        $airdrop->update(['status' => $request->status]);

        return redirect()->route('airdrop.show', $id)->with('success', 'Status updated successfully!');
    }

    public function updateNotes(Request $request, $id)
    {
        // Only admin can update notes
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('airdrop.show', $id)->with('error', 'Unauthorized');
        }

        $request->validate([
            'notes' => 'nullable|string',
        ]);

        $airdrop = Airdrop::findOrFail($id);
        $airdrop->update(['notes' => $request->notes]);

        return redirect()->route('airdrop.show', $id)->with('success', 'Notes updated successfully!');
    }

    public function markCompleted(Request $request, $id)
    {
        // Only admin can mark as completed
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('airdrop.show', $id)->with('error', 'Unauthorized');
        }

        $request->validate([
            'earnings' => 'required|numeric|min:0',
            'end_date' => 'required|date',
        ]);

        $airdrop = Airdrop::findOrFail($id);
        $airdrop->update([
            'is_completed' => true,
            'earnings' => $request->earnings,
            'start_date' => $airdrop->created_at,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('airdrop.show', $id)->with('success', 'Project marked as completed!');
    }

    public function toggleDailyChecklist(Request $request, $id)
    {
        // Only authenticated users can toggle checklist
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $airdrop = Airdrop::findOrFail($id);
        $userId = Auth::id();

        // Get or create today's checklist
        $checklist = \App\Models\DailyChecklist::getTodayChecklist($userId, $id);

        // Toggle completion status
        if ($checklist->is_completed) {
            $checklist->update(['is_completed' => false, 'completed_at' => null]);
            $message = 'Daily task unchecked!';
        } else {
            $checklist->markCompleted();
            $message = 'Daily task completed! ✓';
        }

        return response()->json([
            'success' => true,
            'is_completed' => $checklist->is_completed,
            'message' => $message
        ]);
    }
}
