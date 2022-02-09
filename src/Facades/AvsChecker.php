<?php

namespace PatrickJunod\AvsChecker\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \PatrickJunod\AvsChecker\AvsChecker
 * @method static isValid(String|Array $avsNumber, bool $checkStrict = true)
 */
class AvsChecker extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'AvsChecker';
    }
}
