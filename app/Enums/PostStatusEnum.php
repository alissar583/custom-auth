<?php

namespace App\Enums;

enum PostStatusEnum: int
{
    case Accepted = 1;
    case Rejected = 2;
    case Pending = 3;

    public static function getAliases(): array
    {
        return [
            self::Accepted->value => 'accepted',
            self::Rejected->value => 'rejected',
            self::Pending->value => 'pending'
        ];
    }

    public static function getAlias($value)
    {
        $aliases = self::getAliases();
        return $aliases[$value];
    }

    public static function getValueByAlias($alias)
    {
        $aliases = array_flip(self::getAliases());
        return $aliases[$alias] ?? null;
    }
}
