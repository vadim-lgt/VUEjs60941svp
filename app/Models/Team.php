<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model//лучше как название
{
    use HasFactory;

    // Определяем отношение "один ко многим" с моделью Player
    public function player(): HasMany//как угодно называем
    {
        return $this->hasMany(Player::class);//к модели.
    }
    //То что выше это для связи один ко многим
}//1 функцию называем как хотим. 2 таблица
/*
class Team extends Model
{
    use HasFactory;

    // Определяем отношение "имеет много игроков"
    public function players()
    {
        return $this->hasMany(Player::class, 'teams_id'); // 'teams_id' - внешний ключ в таблице players.
    }//На случай, если автоматом не определяет ключи первичный и вторичный
}*/
