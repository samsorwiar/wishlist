<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $users = User::all();
        $wishlists = Wishlist::all();
        return view('frontend/index', compact('wishlists', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('frontend/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $wishlist = new Wishlist;

        $wishlist->name = $request->input('name');
        $wishlist->description = $request->input('description');
        $wishlist->link_to_site = $request->input('link_to_site');
        $wishlist->price = $request->input('price');

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/image/', $filename);
            $wishlist->image = $filename;
        }

        $wishlist->save();
        return redirect()->route('index')->with('success', 'Wish is created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param Wishlist $wishlist
     * @return Application|Factory|View
     */
    public function show(Wishlist $wishlist)
    {
        return view('frontend.show', compact('wishlist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Wishlist $wishlist
     * @return Application|Factory|View
     */
    public function edit(Wishlist $wishlist)
    {
        return view('frontend.edit', compact('wishlist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Wishlist $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $wishlist = Wishlist::find($id);
        $wishlist->name = $request->input('name');
        $wishlist->description = $request->input('description');
        $wishlist->link_to_site = $request->input('link_to_site');
        $wishlist->price = $request->input('price');

        if ($request->hasFile('image')) {
            $destination = 'uploads/image/' . $wishlist->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/image/', $filename);
            $wishlist->image = $filename;
        }

        $wishlist->save();
        return redirect()->route('index')->with('success', 'Your wish Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Wishlist $wishlist
     * @return RedirectResponse
     */
    public function destroy(Wishlist $wishlist)
    {
        $wishlist = Wishlist::find($wishlist->id);
        $destination = 'uploads/image/' . $wishlist->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $wishlist->delete();
        return redirect()->route('index')->with('success', 'Wish is deleted successfully!');
    }
}
