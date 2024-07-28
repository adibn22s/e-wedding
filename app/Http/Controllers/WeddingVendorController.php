<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVendorRequest;
use App\Models\User;
use App\Models\Vendor;
use App\Models\WeddingVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WeddingVendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendors = Vendor::orderByDesc('id')->get();

        return view('admin.vendors.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVendorRequest $request)
    {
        $validated = $request->validated();

        $user = User::where('email', $validated['email'])->first();
        if(!$user) {
            return back()->withErrors([
                'email' => 'Data tidak ada'
            ]);            
        }

        if($user->hasRole('vendor')) {
            return back()->withErrors([
                'email' => 'Email Sudah Terdaftar Menjadi Teacher'
            ]);
        }
        
        DB::transaction(function () use ($user, $validated) {
            $validated['user_id'] = $user->id;
            $validated['name'] = 'testing';
            $validated['bank_name'] = 'testing';
            $validated['account_number'] = '123123218736127';
            $validated['is_active'] = true;
            
            Vendor::create($validated);

            if ($user->hasRole('customer')) {
                $user->removeRole('customer');
            }

            $user->assignRole('vendor');

        });

        return redirect()->route('admin.vendors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $Vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $Vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendor $Vendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $Vendor)
    {
        //
    }
}
