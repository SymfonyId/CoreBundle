<?php

namespace Symfonian\Indonesia\CoreBundle\Toolkit\DoctrineManager;

class DateRange extends AbstractFilter
{
    private $startDate;

    private $endDate;

    public function __construct($field = null, $alias = null, \DateTime $startDate = null, \DateTime $endDate = null)
    {
        $this->setAlias($alias);
        $this->setField($field);
        $this->setEndDate($startDate);
        $this->setEndDate($endDate);
    }

    public function setStartDate(\DateTime $dateTime)
    {
        $this->startDate = $dateTime;
    }

    public function setEndDate(\DateTime $dateTime)
    {
        $this->endDate = $dateTime;
    }

    public function getQueryBuilder()
    {
        $this->queryBuilder->andWhere(sprintf('%s >= %s', $this->getField(), $this->startDate));
        $this->queryBuilder->andWhere(sprintf('%s <= %s', $this->getField(), $this->endDate));

        return $this->queryBuilder;
    }
}
