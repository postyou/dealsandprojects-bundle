<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Api;

class CustomTable extends AbstractApi
{
    protected string $tableName;

    public function withTableName(string $tableName): static
    {
        $new = clone $this;
        $new->tableName = $tableName;

        return $new;
    }

    /**
     * @param array<string,mixed> $params
     *
     * @return object[]
     */
    public function list(array $params = []): array
    {
        $params['TableName'] = $this->tableName;

        return $this->getAll($this->getEndpoint(), $params);
    }

    /**
     * @return object[]
     */
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
