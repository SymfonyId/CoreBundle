<?php

namespace Tests\Toolkit\Util\DateUtil;

use Symfonian\Indonesia\CoreBundle\Toolkit\Util\DateUtil\ValidIntervalChecker;

class ValidIntervalCheckerTest extends \PHPUnit_Framework_TestCase
{
    private $startDate;

    private $endDate;

    public function setUp()
    {
        $this->startDate = new \DateTime();
        $this->endDate = clone $this->startDate;
        $this->endDate->add(new \DateInterval('P1D'));//add 1 day
    }

    public function testIsValidInterval()
    {
        $this->assertTrue(ValidIntervalChecker::isValid($this->startDate, $this->endDate));
    }

    public function testInvalidInterval()
    {
        $this->assertNotTrue(ValidIntervalChecker::isValid($this->endDate, $this->startDate));
    }
}
