<?php

namespace Symfonian\Indonesia\CoreBundle\Toolkit\Security;

use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

class SymfonyIdPasswordEncoder implements PasswordEncoderInterface
{
    public function encodePassword($raw, $salt)
    {
        return password_hash($this->encode($raw, $salt), PASSWORD_BCRYPT);
    }

    public function isPasswordValid($encoded, $raw, $salt)
    {
        return password_verify($this->encode($raw, $salt), $encoded);
    }

    private function encode($raw, $salt)
    {
        return sha1(sprintf('%s{%s}%s', $salt, sha1($raw), $salt));
    }

    public static function generateSalt()
    {
        return sha1(sprintf('%s{%s}%s', microtime(), uniqid('SYMFONYINDONESIA'), microtime()));
    }
}