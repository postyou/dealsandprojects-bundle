<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Api;

/**
 * @extends AbstractApi<\Postyou\DealsAndProjectsBundle\Entities\TimeRecord>
 */
class TimeRecord extends AbstractApi {
    /**
     * @param integer $projectId
     * @return \Postyou\DealsAndProjectsBundle\Entities\TimeRecord[]
     */
    public function listForProject(int $projectId): array {
        return parent::list([
            'ProjectId' => $projectId,
        ]);
    }

    /**
     * @param integer $taskId
     * @return \Postyou\DealsAndProjectsBundle\Entities\TimeRecord[]
     */
    public function listForTask(int $taskId): array {
        return parent::list([
            'TaskId' => $taskId,
        ]);
    }

    /**
     * @param integer $userId
     * @return \Postyou\DealsAndProjectsBundle\Entities\TimeRecord[]
     */
    public function listForUser(int $userId): array {
        return parent::list([
            'UserId' => $userId,
        ]);
    }

    /**
     * @param integer $contactId
     * @return \Postyou\DealsAndProjectsBundle\Entities\TimeRecord[]
     */
    public function listForContact(int $contactId): array {
        return parent::list([
            'ContactId' => $contactId,
        ]);
    }

    protected function getEndpoint(): string {
        return 'timerecord';
    }
}
