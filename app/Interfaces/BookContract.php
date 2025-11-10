<?php

namespace App\Interfaces;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

interface BookContract {
    public function all(): Collection;

    public function store(array $data): Book;

    public function update(Book $book, array $data): Book;

    public function show(Book $book): Book;
    
    public function delete(Book $book): void;
}