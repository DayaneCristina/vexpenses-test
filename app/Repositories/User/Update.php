<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Domains\User\Update as UpdateDomain;

class Update extends BaseRepository
{
    /**
     * Parâmetros de criação de usuário
     *
     * @var UpdateDomain
     */
    protected UpdateDomain $domain;

    /**
     * Setar a model do usuário
     *
     * @return void
     */
    public function setModel(): void
    {
        $this->model = User::class;
    }

    public function __construct(UpdateDomain $domain)
    {
        $this->domain = $domain;

        parent::__construct();
    }

    /**
     * Modificação de usuário
     *
     * @return array
     */
    public function handle(): array
    {
        $this->builder->where('company_id', $this->domain->companyId);

        return $this->update(
            $this->domain->id,
            array_filter(
                [
                    'name'     => $this->domain->name,
                    'email'    => $this->domain->email,
                    'password' => $this->domain->password,
                    'type'     => $this->domain->type,
                ]
            )
        );
    }
}
