<?php

namespace App\Repositories\Company;

use App\Models\Company;
use App\Repositories\BaseRepository;

class Find extends BaseRepository
{
    /**
     * Id da empresa
     *
     * @var string
     */
    protected string $id;

    /**
     * Setar a model do empresa
     *
     * @return void
     */
    public function setModel(): void
    {
        $this->model = Company::class;
    }

    public function __construct(string $id)
    {
        $this->id = $id;

        parent::__construct();
    }

    /**
     * Empresa
     *
     * @return array|null
     */
    public function handle(): ?array
    {
        return $this->find($this->id);
    }
}
