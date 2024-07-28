<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use App\Models\Catalogue;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catalogues = Catalogue::with(['category', 'vendor', 'books'])->orderByDesc('id')->get();
        $categories = Category::orderByDesc('id')->get();
        return view('front.index', compact('catalogues', 'categories'));
    }

    public function details(Catalogue $catalogue)
    {
        return view('front.details', compact('catalogue'));
    }

    public function checkout(Catalogue $catalogue)
    {
        return view('front.checkout', compact('catalogue'));
    }

    public function checkout_store(StoreBookRequest $request, Catalogue $catalogue)
    {
        $user = Auth::user();

        DB::transaction( function () use ($request, $user, $catalogue) {

            $validated = $request->validated();
            if($request->hasFile('proof')) {
                $proofPath = $request->file('proof')->store('proofs', 'public');
                $validated['proof'] = $proofPath;
            } 

            $dp= $catalogue->price / 2;

            $validated['user_id'] = $user->id;
            $validated['catalogue_id'] = $catalogue->id;
            $validated['total_amount'] = $dp;
            $validated['is_paid'] = false;

            $transaction = Book::create($validated);

        });
        return redirect()->route('front.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
