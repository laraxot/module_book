<?php
namespace Modules\Book\Contracts;

interface BookRepository {
    public function add (array $data): void;

    public function findByIsbn(string $isbn): ?array;

    /** .... */
}