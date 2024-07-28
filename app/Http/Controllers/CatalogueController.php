<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCatalogueRequest;
use App\Http\Requests\UpdateCatalogueRequest;
use App\Models\Catalogue;
use App\Models\Category;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();   
        $query = Catalogue::with(['category', 'vendor'])->orderByDesc('id');

        if($user->hasRole('vendor')){
            $query->whereHas('vendor', function ($query) use ($user){
                $query->where('user_id', $user->id);
            });
        }

        $catalogues = $query->paginate(10);

        return view('admin.catalogues.index', compact('catalogues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.catalogues.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCatalogueRequest $request)
    {
        $vendor = Vendor::where('user_id', Auth::user()->id)->first();
        
        if(!$vendor) {
            return redirect()->route('admin.catalogues.index')->withErrors('Unauthorized or Invalid Vendor');
        }

        DB::transaction(function () use ($request, $vendor) {
            
            $validated = $request->validated();

            if($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $validated['slug'] = Str::slug($validated['name']);
            $validated['vendor_id'] = $vendor->id;

            $catalogue = Catalogue::create($validated);

            if(!empty($validated['catalogue_benefits'])){
                foreach($validated['catalogue_benefits'] as $benefitText) {
                    $catalogue->catalogue_benefits()->create([
                        'name' => $benefitText,
                    ]);
                }
            }
        });

        return redirect()->route('admin.catalogues.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Catalogue $catalogue)
    {
        return view('admin.catalogues.show', compact('catalogue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Catalogue $catalogue)
    {
        $categories = Category::all();
        return view('admin.catalogues.edit', compact('catalogue', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCatalogueRequest $request, Catalogue $catalogue)
    {
        DB::transaction(function () use ($request, $catalogue) {
            
            $validated = $request->validated();

            if($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $validated['slug'] = Str::slug($validated['name']);

            $catalogue->update($validated);

            if(!empty($validated['catalogue_benefits'])){
                $catalogue->catalogue_benefits()->delete();
                foreach($validated['catalogue_benefits'] as $keypointText) {
                    $catalogue->catalogue_benefits()->create([
                        'name' => $keypointText,
                    ]);
                }
            }
        });

        return redirect()->route('admin.catalogues.show', $catalogue);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catalogue $catalogue)
    {
        DB::beginTransaction();

        try {
            $catalogue->delete();
            DB::commit();
            return redirect()->route('admin.catalogues.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.catalogues.index')->with('error', 'terjadi error');

        }
    }
}
