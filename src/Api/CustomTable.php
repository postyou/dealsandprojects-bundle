<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Api;

use Error;

class CustomTable extends AbstractApi {
    protected string $tableName;

    public function withTableName(string $tableName): static {
        $new = clone $this;
        $new->tableName = $tableName;

        return $new;
    }

    public function read(int $id, array $params = []): object {
        if (!$this->tableName) throw new Error("Table name has to be specified before reading from API.");
        return parent::read($id, $params);
    }

    public function list(array $params = []): array {
        if (!$this->tableName) throw new Error("Table name has to be specified before reading from API.");
        array_push($params, ['TableName' => $this->tableName]);
        return $this->list($params);
    }

    public function listForOwner(int $id): array {
        if (!$this->tableName) throw new Error("Table name has to be specified before reading from API.");
        return $this->list([
            'TableName' => $this->tableName,
            'OwnerId' => $id,
        ]);
    }

    protected function getEndpoint(): string {
        return 'customtableentry';
    }
}
