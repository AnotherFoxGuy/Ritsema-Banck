<?php
namespace RitsemaBanck;
class Session
{
    public static function is_private($page): bool
    {
        $private = ['dashboard', 'overview'];

        if (in_array($page, $private)) {
            return true;
        } else {
            return false;
        }
    }
}
