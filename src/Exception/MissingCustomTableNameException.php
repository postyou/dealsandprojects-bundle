<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Exception;

use Exception;

class MissingCustomTableNameException extends Exception
{
    public function __construct()
    {
        $message = 'You have to explicitly set a table name via the withTableName() method, before using Postyou\DealsAndProjectsBundle\Api\CustomTable.';

        parent::__construct($message, 0, null);
    }
}
