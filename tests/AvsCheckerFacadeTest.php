<?php

use PatrickJunod\AvsChecker\Exceptions\AvsNumberExceptions;
use PatrickJunod\AvsChecker\Facades\AvsChecker;

it('can instantiate a new AVS Checker as Facade', function () {

   expect(AvsChecker::isValid('test'))->toBeFalse();
});