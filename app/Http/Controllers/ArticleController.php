<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $articles = Wishlist::all();
        return view('backend/index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('backend/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $article = new Wishlist();

        $article->name = $request->input('name');
        $article->description = $request->input('description');
        $article->link_to_site = $request->input('link_to_site');
        $article->price = $request->input('price');

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/image/', $filename);
            $article->image = $filename;
        }

        $article->save();
        return redirect()->route('dashboard')->with('success', 'Wish is created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param Wishlist $article
     * @return Application|Factory|View
     */
    public function show(Wishlist $article)
    {
        return view('backend.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Wishlist $article
     * @return Application|Factory|View
     */
    public function edit(Wishlist $article)
    {
        return view('backend/edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Wishlist $wishlist
     * @return void
     */
    public function update(Request $request, Wishlist $wishlist)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Wishlist $wishlist
     * @return Response
     */
    public function destroy(Wishlist $wishlist)
    {
        //
    }

    private function storeImage(UploadedFile $image)
    {
        $imagePath = 'public/images';
        $imageName = $image->hashName();

        $image->storeAs($imagePath, $imageName);

        return $imageName;
    }
}
