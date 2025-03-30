<?php

namespace App\Integrations\Banking;

class GatewayDetailsResponse
{
    /**
     * @var array
     */
    private array $data;

    /**
     * @param  array  $data
     */
    public function __construct(
        array $data,
    ) {
        $this->setData($data);
    }

    /**
     * Retorna a resposta formatada.
     *
     * @return array
     */
    public function response(): array
    {
        return [
            'data' => $this->getData(),
        ];
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param  array  $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }
}
