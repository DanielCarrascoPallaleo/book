<?php

namespace App\Services;

use App\Interfaces\BookContract;
use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

class BookService implements BookContract
{
    public function all(): Collection
    {
        $book = Book::all();

        return $book;
    }

    public function store(array $data): Book
    {
        $libroNuevo = Book::create($data);

        return $libroNuevo;
    }

    public function update(Book $book, array $data): Book
    {
        $book->title = $data['title'];

        $book->save();

        return $book;
    }

    public function delete(Book $book): void
    {
        $book->delete();
    }

    public function show(Book $book): Book
    {
        return $book;
    }
}
