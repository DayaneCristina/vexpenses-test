<?php

namespace App\Models;

use App\Models\Account;
use App\Models\Traits\UuidAsPrimaryKey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Card extends Model
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
        'account_id',
        'status',
    ];

    /**
     * Conta
     */
    public function user()
    {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }
}
