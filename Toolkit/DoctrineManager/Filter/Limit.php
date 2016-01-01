<?php

namespace Symfonian\Indonesia\CoreBundle\Toolkit\DoctrineManager;

class Limit extends AbstractFilter
{
    private $startRecord;

    private $limit;

    const DEFAULT_LIMIT = 10;

    public function __construct($field = null, $alias = null, $startRecord = 0, $limit = self::DEFAULT_LIMIT)
    {
        $this->setAlias($alias);
        $this->setField($field);
        $this->setStartRecord($startRecord);
        $this->setLimit($limit);
    }

    public function setStartRecord($startRecord)
    {
        $this->startRecord = (int) $startRecord;
    }

    public function setLimit($limit)
    {
        $this->limit = (int) $limit;
    }

    public function getQueryBuilder()
    {
        // TODO: Implement getQueryBuilder() method.
    }
}
