<?php

namespace App\Models;

use App\Enums\PostStatusEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected function status(): Attribute
    {
        return Attribute::make(
            fn (string $value) => PostStatusEnum::getAlias($value),
            fn (string $value) => PostStatusEnum::getValueByAlias($value),
        );
    }
}
