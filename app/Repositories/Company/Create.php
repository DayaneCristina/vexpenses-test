<?php

namespace App\Repositories\Company;

use App\Models\Company;
use App\Repositories\BaseRepository;
use App\Domains\Company\Create as CreateDomain;

class Create extends BaseRepository
{
    /**
     * Dados para criação de empresa
     *
     * @var CreateDomain
     */
    protected CreateDomain $domain;

    /**
     * Setar a model da empresa
     *
     * @return void
     */
    public function setModel(): void
    {
        $this->model = Company::class;
    }

    public function __construct(CreateDomain $domain)
    {
        $this->domain = $domain;

        parent::__construct();
    }

    /**
     * Criação de empresa
     *
     * @return array
     */
    public function handle(): array
    {
        return $this->create(
            [
                'name'            => $this->domain->name,
                'document_number' => $this->domain->documentNumber,
            ]
        );
    }
}
