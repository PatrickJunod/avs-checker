<?php

use PatrickJunod\AvsChecker\AvsChecker;
use PatrickJunod\AvsChecker\Exceptions\AvsNumberExceptions;

it('can instantiate a new AVS Checker', function () {
    $avsNumber = new AvsChecker('756.1234.5678.12');

    expect($avsNumber)->toBeInstanceOf(AvsChecker::class);
});

it('validates a correct AVS Number', function () {
    $avsNumber = new AvsChecker('756.3620.0705.92');
    expect($avsNumber->isValid())->toBeTrue();
});

it('detects an empty AVS Number', function () {
    $avsNumber = new AvsChecker('');
    $avsNumber->isValid();
})->throws(AvsNumberExceptions::class);

it('validates an invalid AVS Number', function () {
    $avsNumber = new AvsChecker('726.1234.0705.12');
    expect($avsNumber->isValid())->toBeFalse();
});

it('detects an invalid number format', function () {
    $avsNumber = new AvsChecker('ABCDEF');
    $avsNumber->isValid();
    expect($avsNumber->isValid())->toBeFalse();
});

it('detects an invalid checksum', function () {
    $avsNumber = new AvsChecker('756.3620.0705.93');
    $avsNumber->isValid();
    expect($avsNumber->isValid())->toBeFalse();
});
