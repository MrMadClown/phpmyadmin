<?php

declare(strict_types=1);

namespace PhpMyAdmin\Controllers\Database\MultiTableQuery;

use PhpMyAdmin\Controllers\AbstractController;
use PhpMyAdmin\Database\MultiTableQuery;
use PhpMyAdmin\Http\ServerRequest;

final class QueryController extends AbstractController
{
    public function __invoke(ServerRequest $request): void
    {
        $params = [
            'sql_query' => $request->getParsedBodyParam('sql_query'),
            'db' => $request->getParam('db'),
        ];

        $this->response->addHTML(MultiTableQuery::displayResults($params['sql_query'], $params['db']));
    }
}
