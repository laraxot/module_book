<?php

namespace Modules\Book\Repositories;

use Modules\Book\Contracts\BookRepository;

class EloquentBookRepository implements BookRepository
{
    public function add (array $data): void {
        /* Input Validation */

        Book::create($data);
    }

    public function findByIsbn(string $isbn): ?array {
    	return Book::find($isbn)->toArray();
    }

    /** .... */
}