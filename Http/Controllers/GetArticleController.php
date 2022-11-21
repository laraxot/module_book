<?php

 declare(strict_types=1);

 namespace Modules\Book\Http\Controllers;

 // ...

 final class GetArticleController extends Controller
 {
    // ...

     public function __construct(GetArticleHandler $handler, Mapper $mapper)
     {
         $this->handler = $handler;
         $this->mapper = $mapper;
     }

     public function __invoke(GetArticleRequest $request):Response
     {
         // GetArticleRequest already handle HTTP validation using ValueObject behind the scene.
         // So if the `id` is invalid won't het there.
         $id = $request->route()->parameter('id');
         $command = new GetArticleCommand(ArticleID::fromUUID($id));
         try {
             $article = ($this->handler)($command);
         } catch(ArticleDoesNotExist $e){
             // ...
         }catch(ImpossibleToRetrieveArticle $e){
             // ...
         } //...

         $response = ($this->mapper)($article);

         return response()->json($response);
     }
 }