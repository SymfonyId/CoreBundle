<?php

namespace Symfonian\Indonesia\CoreBundle\Toolkit\DoctrineManager;

use Doctrine\ORM\QueryBuilder;

abstract class AbstractFilter implements FilterInterface
{
    protected $alias;

    protected $field;

    /**
     * @var QueryBuilder
     */
    protected $queryBuilder;

    public function setAlias($alias)
    {
        $this->alias = $alias;
    }

    public function setField($field)
    {
        $this->field = $field;
    }

    public function getField()
    {
        $prefix = '';
        if (null !== $this->alias) {
            $prefix = $this->alias.'.';
        }

        return $prefix.$this->field;
    }

    public function setQueryBuilder(QueryBuilder $queryBuilder)
    {
        $this->queryBuilder = clone $queryBuilder;
    }
}
