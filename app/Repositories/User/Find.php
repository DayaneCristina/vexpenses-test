<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;

class Find extends BaseRepository
{
    /**
     * Id do usuário
     *
     * @var string
     */
    protected string $id;

    /**
     * Id da empresa
     *
     * @var string
     */
    protected string $companyId;

    /**
     * Setar a model do usuário
     *
     * @return void
     */
    public function setModel(): void
    {
        $this->model = User::class;
    }

    public function __construct(string $id, string $companyId)
    {
        $this->id        = $id;
        $this->companyId = $companyId;

        parent::__construct();
    }

    /**
     * Usuário, se existir
     *
     * @return array|null
     */
    public function handle(): ?array
    {
        $this->builder->where('company_id', $this->companyId);

        return $this->find($this->id);
    }
}
