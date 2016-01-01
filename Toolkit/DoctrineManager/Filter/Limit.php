<?php

namespace Symfonian\Indonesia\CoreBundle\Toolkit\DoctrineManager;

class Limit
{
    private $startRecord;

    private $limit;

    public function __construct($startRecord = 0, $limit = 1)
    {
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

    public function getStartRecord()
    {
        return $this->startRecord;
    }

    public function getLimit()
    {
        return $this->limit;
    }
}