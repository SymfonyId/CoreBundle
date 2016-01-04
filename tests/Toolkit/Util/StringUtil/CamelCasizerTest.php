<?php

namespace Tests\Toolkit\Util\StringUtil;

use Symfonian\Indonesia\CoreBundle\Toolkit\Util\StringUtil\CamelCasizer;

class CamelCasizerTest extends \PHPUnit_Framework_TestCase
{
    public function testUnderScoreToCamelCase()
    {
        $this->assertEquals('iniCamelCase', CamelCasizer::underScoretToCamelCase('ini_camel_case'));
    }

    public function testCamelCaseToUnderScore()
    {
        $this->assertEquals('ini_under_score', CamelCasizer::camelCaseToUnderScore('iniUnderScore'));
    }

    public function testCamelCaseNotChange()
    {
        $this->assertEquals('iniCamelCase', CamelCasizer::underScoretToCamelCase('iniCamelCase'));
    }

    public function testUnderScoreNotChange()
    {
        $this->assertEquals('ini_under_score', CamelCasizer::camelCaseToUnderScore('ini_under_score'));
    }

    public function testCombineUnderScoreAndCamelCaseToUnderScore()
    {
        $this->assertEquals('ini_under_score', CamelCasizer::camelCaseToUnderScore('iniUnder_Score'));
    }

    public function testCombineUnderScoreAndCamelCaseToCamelCase()
    {
        $this->assertEquals('iniCamelCase', CamelCasizer::underScoretToCamelCase('ini_camelCase'));
    }
}