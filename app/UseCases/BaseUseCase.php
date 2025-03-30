<?php

namespace App\UseCases;

use App\Traits\Logger;
use App\Traits\Instancer;

abstract class BaseUseCase
{
    use Logger;
    use Instancer;
}
