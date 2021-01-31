<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Models\Book;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Author::with('books')->latest('updated_at')->get();

        return view('admin.authors.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::get();

        return view('admin.authors.create', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, Author::rules());

        $data = $request->all();

        $author = Author::create($data);

        $author->books()->attach($data['books']);

        return back()->withSuccess(trans('app.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Author::with('books')->findOrFail($id);

        $selectedBooks = [];

        foreach ($item->books as $key => $book) {
            array_push($selectedBooks, $book->id);
        }

        $books = Book::get();

        return view('admin.authors.edit', compact('item', 'books', 'selectedBooks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, Author::rules(true, $request->id));

        $data = $request->all();

        $item = Author::with('books')->findOrFail($id);

        $books = $item->books;

        if (array_key_exists('books', $data)) {
            foreach ($books as $key => $book) {
                if (!in_array($data['books'], [$book->id], true)) {
                    $item->books()->detach($book->id);
                } elseif (in_array($data['books'], [$book->id], true)) {
                    unset($data['books'][$key]);
                }
            }

            $item->books()->attach($data['books']);
        } else {
            $item->books()->detach();
        }

        $item->update($data);

        return redirect()->route(ADMIN . '.authors.index')->withSuccess(trans('app.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = auth()->user();
        if ($user->role != 10) {
            return back()->withErrors(trans('app.unauthorized_destroy'));
        }

        Author::destroy($id);

        return back()->withSuccess(trans('app.success_destroy'));
    }
}
