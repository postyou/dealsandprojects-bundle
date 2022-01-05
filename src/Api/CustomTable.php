<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Api;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CustomTable extends AbstractApi
{
    protected string $tableName;

    public function __construct(HttpClientInterface $dealsandprojectsApi, string $tableName)
    {
        parent::__construct($dealsandprojectsApi);

        $this->tableName = $tableName;
    }

    public function list(): array
    {
        return $this->getAll($this->getEndpoint(), [
            'TableName' => $this->tableName,
        ]);
    }

    public function listForOwner(int $id): array
    {
        return $this->getAll($this->getEndpoint(), [
            'TableName' => $this->tableName,
            'OwnerId' => $id,
        ]);
    }

    protected function getEndpoint(): string
    {
        return 'customtableentry';
    }
}
