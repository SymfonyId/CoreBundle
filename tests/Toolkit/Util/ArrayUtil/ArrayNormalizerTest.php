<?php

namespace Tests\Toolkit\Util\ArrayUtil;

use Symfonian\Indonesia\CoreBundle\Toolkit\Util\ArrayUtil\ArrayNormalizer;

class ArrayNormilizerTest extends \PHPUnit_Framework_TestCase
{
    public function testSetValueToObjectFromArray()
    {
        $object = new Stub();
        ArrayNormalizer::convertToObject(array('name' => 'Surya'), $object);

        $this->assertEquals('Surya', $object->getName());
    }
}