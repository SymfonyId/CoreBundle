<?php

namespace Symfonian\Indonesia\CoreBundle\Toolkit\DoctrineManager;

class DateRange
{
    private $startDate;

    private $endDate;

    public function __construct(\DateTime $startDate = null, \DateTime $endDate = null)
    {
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

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }
}