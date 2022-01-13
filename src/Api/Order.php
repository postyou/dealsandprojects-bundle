<?php

declare(strict_types=1);

/*
 * @author  POSTYOU Digital- & Filmagentur
 * @license MIT
 */

namespace Postyou\DealsAndProjectsBundle\Api;

class Order extends AbstractApi
{
    protected function getEndpoint(): string
    {
        return 'order';
    }
}
