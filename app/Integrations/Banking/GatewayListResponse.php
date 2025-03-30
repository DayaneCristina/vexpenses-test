<?php

namespace App\Integrations\Banking;

class GatewayListResponse
{
    /**
     * @var array
     */
    private array $data;

    /**
     * @var int
     */
    private int $actualPage;

    /**
     * @var int
     */
    private int $totalPages;

    /**
     * @param  array  $data
     * @param  int    $actualPage
     * @param  int    $totalPages
     */
    public function __construct(
        array $data,
        int $actualPage = 1,
        int $totalPages = 1
    ) {
        $this->setData($data);
        $this->setActualPage($actualPage);
        $this->setTotalPages($totalPages);
    }

    /**
     * Retorna a resposta formatada.
     *
     * @return array
     */
    public function response(): array
    {
        return [
            'data'        => $this->getData(),
            'actual-page' => $this->getActualPage(),
            'total-pages' => $this->getTotalPages(),
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

    /**
     * @return int
     */
    public function getActualPage(): int
    {
        return $this->actualPage;
    }

    /**
     * @param  int  $actualPage
     */
    public function setActualPage(int $actualPage): void
    {
        $this->actualPage = $actualPage;
    }

    /**
     * @return int
     */
    public function getTotalPages(): int
    {
        return $this->totalPages;
    }

    /**
     * @param  int  $totalPages
     */
    public function setTotalPages(int $totalPages): void
    {
        $this->totalPages = $totalPages;
    }
}
