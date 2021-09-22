<?php

namespace PatrickJunod\AvsChecker;

use PatrickJunod\AvsChecker\Exceptions\AvsNumberExceptions;

class AvsChecker
{
    /**
     * AVS Number.
     *
     * @var string
     */
    private String $avsNumber;

    /**
     * Length of the digits in the AVS Number.
     *
     * @var int
     */
    protected Int $charLength = 13;

    /**
     * AvsChecker constructor.
     */
    public function __construct()
    {
        $this->avsNumber = '';
    }

    /**
     * Check if the given checksum match with the calculated one.
     *
     * @return bool
     */
    private function hasValidChecksum(): bool
    {
        return $this->getChecksum() === $this->getAvsNumberInArray()[$this->charLength - 1];
    }

    /**
     * Remove all unnecessary Chars and Split the given AVS Number to an array.
     *
     * @return array<Int>
     */
    public function getAvsNumberInArray(): array
    {
        $formatted = preg_replace('/[^0-9]/', '', $this->avsNumber) ?? '';
        $formatted = str_split($formatted);

        foreach ($formatted as $key => $value) {
            $formatted[$key] = (int) $value;
        }

        return $formatted;
    }

    /**
     * Return the checksum of the AVS Number based on EAN13 Checksum.
     *
     * @return int
     */
    public function getChecksum(): int
    {
        $avsArray = $this->getAvsNumberInArray();

        $odd = $even = 0;

        for ($i = 0; $i < count($avsArray) - 1; $i++) {
            if ($i % 2) {
                $odd += $avsArray[$i];
            } else {
                $even += $avsArray[$i];
            }
        }

        $odd = $odd * 3;
        $sum = $even + $odd;
        $lastNumber = $sum % 10;

        return (10 - $lastNumber) % 10;
    }

    /**
     * Check if the given AVS Number is formatted correctly (756.XXXX.XXXX.XY).
     *
     * @param  bool $checkStrict
     * @return bool
     */
    public function hasValidFormat(bool $checkStrict = false): bool
    {
        return $checkStrict
            ? preg_match('/[7][5][6]\\.[\d]{4}[.][\d]{4}[.][\d]{2}$/', $this->avsNumber)
            : preg_match('/[7][5][6]\.?[\d]{4}\.?[\d]{4}\.?[\d]{2}$/', $this->avsNumber);
    }

    /**
     * Check if the given AVS Number is Valid or Not.
     *
     * @param  String $avsNumber The AVS Number provided
     * @param  bool $checkStrict
     * @return bool
     * @throws AvsNumberExceptions
     */
    public function isValid(String $avsNumber, bool $checkStrict = true): bool
    {
        $this->avsNumber = $avsNumber;

        if (! $this->avsNumber) {
            throw new AvsNumberExceptions('AVS Number is not set');
        }

        if (! $this->hasValidFormat($checkStrict)) {
            return false;
        }

        if (! $this->hasValidChecksum()) {
            return false;
        }

        return true;
    }
}
