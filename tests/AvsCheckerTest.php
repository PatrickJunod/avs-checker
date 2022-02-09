<?php

use PatrickJunod\AvsChecker\Exceptions\AvsNumberNotSetException;
use PatrickJunod\AvsChecker\Facades\AvsChecker;

it('throw an exception if the AVS number is empty', function () {
    expect(fn() => AvsChecker::isValid(''))->toThrow(AvsNumberNotSetException::class);
});

it('return true with a correct AVS number', function () {
    $avsChecker = AvsChecker::isValid('756.2036.0507.92');
    expect($avsChecker)->toBeTrue();
});

it('return false with a wrong AVS format', function () {
    $avsChecker = AvsChecker::isValid('7526.2036.0507.92');
    expect($avsChecker)->toBeFalse();
});

it('return false with a wrong AVS checksum number', function () {
    $avsChecker = AvsChecker::isValid('756.2036.0507.93');
    expect($avsChecker)->toBeFalse();
});

it('return true with a correct AVS number without dots separation', function () {
    $avsChecker = AvsChecker::isValid('7562036050792', false);
    expect($avsChecker)->toBeTrue();
});

it('return false with a wrong AVS checksum number without dots separation', function () {
    $avsChecker = AvsChecker::isValid('7562036050793', false);
    expect($avsChecker)->toBeFalse();
});

it('return the correct validation for each items in an array', function () {
    $avsChecker = AvsChecker::isValid(['756.2036.0507.92', 'AAA', '751.2036.0507.92', '7512036050793', '7562036050792'], false);
    expect($avsChecker)->toMatchArray(
        [
            [
                "number" => "756.2036.0507.92",
                "isValid" => true
            ],
            [
                "number" => "AAA",
                "isValid" => false
            ],
            [
                "number" => "751.2036.0507.92",
                "isValid" => false
            ],
            [
                "number" => "7512036050793",
                "isValid" => false
            ],
            [
                "number" => "7562036050792",
                "isValid" => true
            ]
        ]);
});

