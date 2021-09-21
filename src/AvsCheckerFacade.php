<?php

namespace PatrickJunod\AvsChecker;

use Illuminate\Support\Facades\Facade;

/**
 * @see \PatrickJunod\AvsChecker\AvsChecker
 */
class AvsCheckerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'avs-checker';
    }
}
