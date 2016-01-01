<?php

namespace Symfonian\Indonesia\CoreBundle\Toolkit\DoctrineManager;

class OrderBy
{
    private $alias;

    private $field;

    private $direction;

    const DIRECTION_ASC = 'ASC';
    const DIRECTION_DESC = 'DESC';

    public function __construct($field, $direction = self::DIRECTION_ASC, $alias = null)
    {
        $this->setField($field);
        $this->setDirection($direction);
        $this->setAlias($alias);
    }

    public function setAlias($alias)
    {
        $this->alias = $alias;
    }

    public function setField($field)
    {
        $this->field = $field;
    }

    public function setDirection($direction)
    {
        $availableDirection = array(self::DIRECTION_ASC, self::DIRECTION_DESC);
        if (!in_array($direction, $availableDirection)) {
            throw new \InvalidArgumentException(sprintf('%s is not valid direction.'));
        }

        $this->direction = $direction;
    }

    public function getDirection()
    {
        return $this->direction;
    }

    public function getFieldOrder()
    {
        $prefix = '';
        if (null !== $this->alias) {
            $prefix = $this->alias.'.';
        }

        return $prefix.$this->field;
    }
}