<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Api;

class TimeRecord extends AbstractApi
{
    /**
     * @return object[]
     */
    public function listForProject(int $projectId): array
    {
        return $this->list([
            'ProjectId' => $projectId,
        ]);
    }

    /**
     * @return object[]
     */
    public function listForTask(int $taskId): array
    {
        return $this->list([
            'TaskId' => $taskId,
        ]);
    }

    /**
     * @return object[]
     */
    public function listForUser(int $userId): array
    {
        return $this->list([
            'UserId' => $userId,
        ]);
    }

    /**
     * @return object[]
     */
    public function listForContact(int $contactId): array
    {
        return $this->list([
            'ContactId' => $contactId,
        ]);
    }

    protected function getEndpoint(): string
    {
        return 'timerecord';
    }
}
