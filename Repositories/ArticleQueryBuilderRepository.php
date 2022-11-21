<?php

declare(strict_types=1);

//namespace App\Integration\Article\Repository;
namespace Modules\Book\Repositories;

// ...

final class ArticleQueryBuilderRepository implements ArticleRepository
{
    // ...
    public function __construct(
        DatabaseManager $database,
        ArticleMapper $mapper,
        Instrumentation $instrumentation
    ) {
        $this->database = $database;
        $this->mapper = $mapper;
        $this->instrumentation = $instrumentation;
    }

    public function getById(ArticleID $articleID): Article
    {
        try {
            $article = $this->database
                ->table(self::TABLE_NAME)
                ->select()->where('id', '=', (string) $articleID)
                ->first();
        } catch (QueryException $e) {
            $this->instrumentation->articleNotRetrieved($e, $articleID);
            throw new ImpossibleToRetrieveArticles($e);
        }

        if (null === $article) {
            $this->instrumentation->articleNotFound($articleID);
            throw new ArticleDoesNotExist($articleID);
        }

        $this->instrumentation->articleFound($articleID);
        return ($this->mapper)($article->toArray());
    }
}