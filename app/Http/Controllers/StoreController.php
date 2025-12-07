<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
public function create()
    {
        return view('store.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'logo'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'about' => 'nullable|string',
            'address' => 'nullable|string',
            'contact' => 'nullable|string',
        ]);

        $logo = null;

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo')->store('store_logos', 'public');
        }

        Store::create([
            'user_id' => Auth::id(),
            'name'    => $request->name,
            'logo'    => $logo,
            'about'   => $request->about,
            'address' => $request->address,
            'contact' => $request->contact,
        ]);

        return redirect()->route('dashboard')->with('success', 'Toko berhasil didaftarkan!');
    }}
