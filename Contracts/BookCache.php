<?php
namespace Modules\Book\Contracts;


interface BookCache {
    public function has(Isbn $isbn):bool;
    public function get(Isbn $isbn):array;
    public function set(Book $book):void;
}