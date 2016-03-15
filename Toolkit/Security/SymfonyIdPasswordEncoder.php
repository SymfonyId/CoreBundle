<?php

namespace Symfonian\Indonesia\CoreBundle\Toolkit\Security;

use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

class SymfonyIdPasswordEncoder implements PasswordEncoderInterface
{
    public function encodePassword($raw, $salt)
    {
        return sha1(sprintf('%s{%s}%s', $salt, sha1('SYMFONYINDONESIA'), $salt));
    }

    public function isPasswordValid($encoded, $raw, $salt)
    {
        return $encoded === $this->encodePassword($raw, $salt);
    }

    public static function generateSalt()
    {
        return sha1(microtime());
    }
}