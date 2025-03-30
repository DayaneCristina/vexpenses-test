<?php

namespace App\Repositories\Account;

use App\Models\Account;
use App\Repositories\BaseRepository;

class Create extends BaseRepository
{
    /**
     * Id de usuário
     *
     * @var string
     */
    protected string $userId;

    /**
     * Id externo
     *
     * @var string
     */
    protected string $externalId;

    /**
     * Setar a model do usuário
     *
     * @return void
     */
    public function setModel(): void
    {
        $this->model = Account::class;
    }

    public function __construct(string $userId, string $externalId)
    {
        $this->userId     = $userId;
        $this->externalId = $externalId;

        parent::__construct();
    }

    /**
     * Criação de conta
     *
     * @return array
     */
    public function handle(): array
    {
        return $this->create(
            [
                'user_id'     => $this->userId,
                'external_id' => $this->externalId,
                'status'      => 'BLOCK',
            ]
        );
    }
}
