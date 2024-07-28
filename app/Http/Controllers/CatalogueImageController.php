<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCatalogueImageRequest;
use App\Http\Requests\UpdateCatalogueImageRequest;
use App\Models\Catalogue;
use App\Models\CatalogueImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogueImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Catalogue $catalogue)
    {
        return view('admin.catalogue_images.create', compact('catalogue'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCatalogueImageRequest $request, Catalogue $catalogue)
    {
        DB::transaction( function () use ($request, $catalogue) {

            $validated = $request->validated();

            $validated['catalogue_id'] = $catalogue->id;
            if($request->hasFile('path_image')) {
                $pathImage = $request->file('path_image')->store('path_images', 'public');
                $validated['path_image'] = $pathImage;
            } else {
                $$pathImage = 'images/icon-default.png';
            }

            $catalogueImage = CatalogueImage::create($validated);

        });

        return redirect()->route('admin.catalogues.show', $catalogue->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(CatalogueImage $catalogueImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatalogueImage $catalogueImage)
    {
        return view('admin.catalogue_images.edit', compact('catalogueImage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCatalogueImageRequest $request, CatalogueImage $catalogueImage)
    {
        DB::transaction( function () use ($request, $catalogueImage) {

            $validated = $request->validated();

            if($request->hasFile('path_image')) {
                $pathImage = $request->file('path_image')->store('path_images', 'public');
                $validated['path_image'] = $pathImage;
            }

            $catalogueImage->update($validated);

        });

        return redirect()->route('admin.catalogues.show', $catalogueImage->catalogue_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatalogueImage $catalogueImage)
    {
        DB::beginTransaction();

        try {
            $catalogueImage->delete();
            DB::commit();
            return redirect()->route('admin.catalogues.show', $catalogueImage->catalogue_id);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.catalogues.index', $catalogueImage->catalogue_id)->with('error', 'terjadi error');

        }
    }
}
