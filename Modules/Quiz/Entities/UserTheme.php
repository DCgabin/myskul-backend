<?php

namespace Modules\Quiz\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserTheme extends Model
{
    use HasFactory;

    protected $fillable = [
        'ok',
        'user_id',
        'theme_id',
    ];

    protected $casts = [
        'ok' => 'boolean',
    ];
    
    protected static function newFactory()
    {
        return \Modules\Quiz\Database\factories\UserThemeFactory::new();
    }
}
