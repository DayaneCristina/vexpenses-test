<?php

namespace App\Repositories\Account;

use App\Models\Account;
use App\Repositories\BaseRepository;

class UpdateStatus extends BaseRepository
{
    /**
     * Id do usuário
     *
     * @var string
     */
    protected string $userId;

    /**
     * Status
     *
     * @var string
     */
    protected string $status;

    /**
     * Setar a model do usuário
     *
     * @return void
     */
    public function setModel(): void
    {
        $this->model = Account::class;
    }

    public function __construct(string $userId, string $status)
    {
        $this->userId = $userId;
        $this->status = $status;

        parent::__construct();
    }

    /**
     * Modifica o status da conta
     *
     * @return array
     */
    public function handle(): array
    {
        $account = (new FindByUser($this->userId))->handle();

        return $this->update(
            $account['id'],
            [
                'status' => $this->status,
            ]
        );
    }
}
