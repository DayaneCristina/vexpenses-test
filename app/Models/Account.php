<?php

namespace App\Models;

use App\Models\User;
use App\Models\Traits\UuidAsPrimaryKey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    use HasFactory;
    use SoftDeletes;
    use UuidAsPrimaryKey;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'external_id',
        'user_id',
        'status',
    ];

    /**
     * Usuário
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
