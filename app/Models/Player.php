<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Player extends Model
{
    use HasFactory;
    protected $table = 'player';
    // Определяем отношение "один ко многим" с моделью Team
    public function team(): BelongsTo//как угодно называем
    {
        return $this->belongsTo(Team::class);//к модели.
    }
    //То что выше это для связи один ко многим
    //То что ниже это для связи многие ко многим
    public function matches(): BelongsToMany//как угодно называем
    {
        return $this->belongsToMany( Matches::class,   'goal');//к модели.
    }
    protected $fillable = [
        'Full_name',
        'role',
        'team_id',
    ];
    public $timestamps = false;
}

