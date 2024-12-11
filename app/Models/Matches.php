<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Matches extends Model
{   /*В этой модели реализована только связь многие-ко-многим
    php artisan make:model Team -m Это создаст как модель, так и файл миграции в директории database/migrations.*/
    use HasFactory;
    public function players(): BelongsToMany//как угодно называем
    {
        return $this->belongsToMany(Player::class, 'goal') -> withPivot(['start_game', 'matches_id']);//к модели
    }
}
