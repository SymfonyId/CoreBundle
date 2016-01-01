<?php

namespace Symfonian\Indonesia\CoreBundle\Toolkit\DoctrineManager;

class OrderBy extends AbstractFilter
{
    private $direction;

    const DIRECTION_ASC = 'ASC';
    const DIRECTION_DESC = 'DESC';

    public function __construct($field = null, $alias = null, $direction = self::DIRECTION_ASC)
    {
        $this->setAlias($alias);
        $this->setField($field);
        $this->setDirection($direction);
    }

    public function setDirection($direction)
    {
        $availableDirection = array(self::DIRECTION_ASC, self::DIRECTION_DESC);
        if (!in_array($direction, $availableDirection)) {
            throw new \InvalidArgumentException(sprintf('%s is not valid direction.'));
        }

        $this->direction = $direction;
    }

    public function getQueryBuilder()
    {
        $this->queryBuilder->addOrderBy($this->getField(), $this->direction);

        return $this->queryBuilder;
    }
}
