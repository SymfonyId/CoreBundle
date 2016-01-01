<?php

namespace Symfonian\Indonesia\CoreBundle\Toolkit\DoctrineManager;

use Doctrine\ORM\QueryBuilder;

interface FilterInterface
{
    public function getQueryBuilder();

    public function setQueryBuilder(QueryBuilder $queryBuilder);

    public function setAlias($alias);

    public function setField($field);

    public function getField();
}
