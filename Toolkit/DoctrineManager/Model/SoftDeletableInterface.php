<?php

namespace Symfonian\Indonesia\CoreBundle\Toolkit\DoctrineManager\Model;

use DateTime;

interface SoftDeletableInterface
{
    /**
     * @param null $isDelete
     * @return boolean
     */
    public function isDelete($isDelete = null);

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
