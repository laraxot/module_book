<?php

namespace Modules\Book\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model {
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory() {
        return \Modules\Book\Database\Factories\BookFactory::new();
    }
}