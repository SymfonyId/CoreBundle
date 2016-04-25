<?php

namespace Symfonian\Indonesia\CoreBundle\Toolkit\DoctrineManager\Model;

use DateTime;

interface SoftDeletableInterface
{
    /**
     * @param null $isDeleted
     * @return boolean
     */
    public function isDeleted($isDeleted = null);

    /**
     * @param DateTime $date
     */
    public function setDeletedAt(DateTime $date);

    /**
     * @return DateTime
     */
    public function getDeletedAt();

    /**
     * @param $username
     */
    public function setDeletedBy($username);

    /**
     * @return string
     */
    public function getDeletedBy();
}
