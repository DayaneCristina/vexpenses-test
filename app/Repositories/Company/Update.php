<?php

namespace App\Repositories\Company;

use App\Models\Company;
use App\Repositories\BaseRepository;
use App\Domains\Company\Update as UpdateDomain;

class Update extends BaseRepository
{
    /**
     * Dados para modificação de empresa
     *
     * @var UpdateDomain
     */
    protected UpdateDomain $domain;

    /**
     * Setar a model da empresa
     *
     * @return void
     */
    public function setModel(): void
    {
        $this->model = Company::class;
    }

    public function __construct(UpdateDomain $domain)
    {
        $this->domain = $domain;

        parent::__construct();
    }

    /**
     * Modificação de empresa
     *
     * @return array
     */
    public function handle(): array
    {
        return $this->update(
            $this->domain->id,
            [
                'name' => $this->domain->name,
            ]
        );
    }
}
