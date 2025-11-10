<?php

namespace App\Http\Controllers;

use App\Http\Requests\Books\StoreRequest;
use App\Http\Requests\UpdateRequestBook;
use App\Models\Book;
use App\Services\BookService;

class BookController extends Controller
{
    public function index(BookService $service)
    {
        $books = $service->all();

        return view('books.index', compact('books'));
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(StoreRequest $request, BookService $service)
    {
        $service->store($request->validated());
        
        return to_route('books.index');
    }

    public function destroy(Book $book, BookService $service)
    {
        $service->delete($book);

        return to_route('books.index');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(UpdateRequestBook $request, Book $book, BookService $service)
    {
        $dataValidada = $request->validated();
        $book = $service->update($book, $dataValidada);

        return to_route('books.index', compact('book'));
    }
}
