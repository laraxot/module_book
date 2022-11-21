<?php

namespace Modules\Book\Console\Commands;
// ...

final class GetArticleCLI extends Command
{
    // ...

    public function __construct(GetArticleHandler $handler, Mapper $mapper)
    {
        $this->handler = $handler;
        $this->mapper = $mapper;
        parent::__construct();
    }

    public function handle(): void
    {
        $id = $this->argument('id');
        try {
            $command = new GetArticleCommand(ArticleID::fromUUID($id));
        } catch (InvalidID $e) {
            // ...
        }
        try {
            $article = ($this->handler)($command);
        } catch(ArticleDoesNotExist $e){
            // ...
        }catch(ImpossibleToRetrieveArticle $e){
            // ...
        } //...

        $this->output->text(($this->fromArticleMapper)($article));
    }
}