<?php

namespace App\Repositories\Interfaces;

interface BaseRepositoryInterface
{
    public function setModel(): void;

    public function getModel(): string;

    public function newInstance(): void;

    public function newBuilder(): void;

    public function find(string|int $id, array $columns = ['*']): array|null;

    public function findOrFail(string|int $id, array $columns = ['*']): array;

    public function first(array $columns = ['*']): array|null;

    public function get(array $columns = ['*']): array;

    public function create(array $attributes): array;

    public function updateOrCreate(array $matchingAttributes, array $values): array;

    public function update(string|int $idEntity, array $attributes): array;

    public function pluck(string $firstColumnPluck, string $secondColumnPluck): array;
}
