<?php

namespace Tests\Toolkit\Util\StringUtil;

use Symfonian\Indonesia\CoreBundle\Toolkit\Util\MimeUtil\MimeGuesser;

class MimeGuesserTest extends \PHPUnit_Framework_TestCase
{
    public function testMimeExtension()
    {
        $this->assertEquals('jpg', MimeGuesser::getExtension('image/jpg'));
        $this->assertEquals('jpg', MimeGuesser::getExtension('image/jpeg'));
    }

    public function testExtensionGetMime()
    {
        $this->assertContains('text/plain', MimeGuesser::getMimeType('text.txt'));
    }

    public function testRealMimeInArray()
    {
        $this->assertArrayHasKey('mime', MimeGuesser::normalizeMime('image/jpeg'));
    }
}