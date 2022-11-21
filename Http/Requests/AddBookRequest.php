<?php
namespace Modules\Book\Http\Requests;
class AddBookRequest {
   public function rules():array {
      return [
         'isbn'        => 'required',
         'title'       => 'required',
         'authors'     => 'required',
         'publishedAt' => 'required',
     ];
   }

   /* ... */
}