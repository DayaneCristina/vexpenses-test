<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Domains\User\Create as CreateDomain;

class Create extends BaseRepository
{
    /**
     * Parâmetros de criação de usuário
     *
     * @var CreateDomain
     */
    protected CreateDomain $domain;

    /**
     * Setar a model do usuário
     *
     * @return void
     */
    public function setModel(): void
    {
        $this->model = User::class;
    }

    public function __construct(CreateDomain $domain)
    {
        $this->domain = $domain;

        parent::__construct();
    }

    /**
     * Criação de usuário
     *
     * @return array
     */
    public function handle(): array
    {
        return $this->create(
            [
                'company_id'      => $this->domain->companyId,
                'name'            => $this->domain->name,
                'document_number' => $this->domain->documentNumber,
                'email'           => $this->domain->email,
                'password'        => $this->domain->password,
                'type'            => $this->domain->type,
            ]
        );
    }
}
