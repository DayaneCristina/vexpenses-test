<?php

namespace App\Models;

use App\Models\User;
use App\Models\Traits\UuidAsPrimaryKey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
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
        'name',
        'email',
        'document_number',
    ];

    /**
     * Usuários da Empresa
     */
    public function users()
    {
        return $this->hasMany(User::class, 'company_id', 'id');
    }
}
