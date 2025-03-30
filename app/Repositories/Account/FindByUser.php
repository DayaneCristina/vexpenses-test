<?php

namespace App\Repositories\Account;

use App\Models\Account;
use App\Repositories\BaseRepository;

class FindByUser extends BaseRepository
{
    /**
     * Id do usuário
     *
     * @var string
     */
    protected string $userId;

    /**
     * Setar a model do usuário
     *
     * @return void
     */
    public function setModel(): void
    {
        $this->model = Account::class;
    }

    public function __construct(string $userId)
    {
        $this->userId = $userId;

        parent::__construct();
    }

    /**
     * Enconta a conta
     *
     * @return array|null
     */
    public function handle(): ?array
    {
        $this->builder->where('user_id', $this->userId);

        return $this->first();
    }
}
