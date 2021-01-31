<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Book::with('authors')->latest('updated_at')->get();

        return view('admin.books.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::get();

        return view('admin.books.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $genres = ['Fantasy', 'Action', 'Historical', 'Misc'];

        $request['genre'] = $genres[$request['genre']];

        $this->validate($request, Book::rules());

        $data = $request->all();

        $book = Book::create($data);

        $book->authors()->attach($data['authors']);

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
        $item = Book::with('authors')->findOrFail($id);

        $selectedAuthors = [];

        foreach ($item->authors as $key => $autho) {
            array_push($selectedAuthors, $autho->id);
        }

        $selectedGenre = 0;
        $check = [$item->genre];
        switch ($item->genre) {
            case 'Fantasy':
                $selectedGenre = 0;
                break;
            case 'Action':
                $selectedGenre = 1;
                break;
            case 'Historical':
                $selectedGenre = 2;
                break;
            case 'Misc':
                $selectedGenre = 3;
                break;
            default:
                $selectedGenre = 4;
        }

        $authors = Author::get();

        return view('admin.books.edit', compact('item', 'authors', 'selectedAuthors', 'selectedGenre'));
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
        $genres = ['Fantasy', 'Action', 'Historical', 'Misc'];

        $request['genre'] = $genres[$request['genre']];

        $this->validate($request, Book::rules(true, $request->id));

        $data = $request->all();

        $item = Book::with('authors')->findOrFail($id);

        $authors = $item->authors;

        if (array_key_exists('authors', $data)) {
            foreach ($authors as $key => $author) {
                if (!in_array($data['authors'], [$author->id], true)) {
                    $item->authors()->detach($author->id);
                } elseif (in_array($data['authors'], [$author->id], true)) {
                    unset($data['authors'][$key]);
                }
            }

            $item->authors()->attach($data['authors']);
        } else {
            $item->authors()->detach();
        }

        $item->update($data);

        return redirect()->route(ADMIN . '.books.index')->withSuccess(trans('app.success_update'));
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

        Book::destroy($id);

        return back()->withSuccess(trans('app.success_destroy'));
    }
}
