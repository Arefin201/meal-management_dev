<?php

namespace App\Http\Controllers;

use App\Models\CookingMember;
use Illuminate\Http\Request;

class CookingMemberController extends Controller
{

    
    public function index()
    {
        $members = CookingMember::latest()->paginate(10);
        return view('pages.cooking_member.index', compact('members'));
    }

    public function create()
    {
        return view('pages.cooking_member.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact_number' => 'required|integer|digits:10',
            'status' => 'required|integer',
        ]);

        CookingMember::create($validated);

        return redirect()->route('cooking-members.index')
            ->with('success', 'Cooking member added successfully');
    }


    public function edit(CookingMember $cookingMember)
    {
        return view('pages.cooking_member.edit', compact('cookingMember'));
    }

    public function update(Request $request, CookingMember $cookingMember)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact_number' => 'required|integer|digits:10',
            'status' => 'required|integer',
        ]);

        $cookingMember->update($validated);

        return redirect()->route('cooking-members.index')
            ->with('success', 'Member updated successfully');
    }

    public function destroy(CookingMember $cookingMember)
    {
        $cookingMember->delete();

        return redirect()->route('cooking-members.index')
            ->with('success', 'Member deleted successfully');
    }
}
