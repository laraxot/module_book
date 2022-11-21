<?php

declare(strict_types=1);

//namespace Acme\Article\UseCase\GetArticle;
namespace Modules\Book\Actions;

// ...

final class GetArticleHandler
{
    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * @throws ArticleDoesNotExist
     * @throws ImpossibleToRetrieveArticle
     */
    public function __invoke(GetArticleCommand $command): Article
    {
        return $this->articleRepository->getById($command->articleID());
    }
}