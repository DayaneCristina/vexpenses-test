<?php

namespace App\Http\Resources\User;

use App\Http\Resources\User\IndexResource;
use App\Http\Resources\BasePaginatorCollection;

class IndexCollectionResource extends BasePaginatorCollection
{
    public $collects = IndexResource::class;
}
