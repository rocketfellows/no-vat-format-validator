<?php

namespace rocketfellows\NOVatFormatValidator;

use rocketfellows\CountryVatFormatValidatorInterface\CountryVatFormatValidator;

class NOVatFormatValidator extends CountryVatFormatValidator
{
    private const VAT_NUMBER_PATTERN = '/^(NO)?\d{9}(MVA)?$/';
    private const CHECKING_VAT_NUMBER_DIGITS_FROM_START_COUNT = 8;
    private const CHECKSUM_WEIGHTING_FACTORS = [3, 2, 7, 6, 5, 4, 3, 2];

    protected function isValidFormat(string $vatNumber): bool
    {
        if (!$this->isVatNumberMatchPattern($vatNumber)) {
            return false;
        }

        if (!$this->isVatNumberChecksumValidationPassed($vatNumber)) {
            return false;
        }

        return true;
    }

    private function isVatNumberMatchPattern(string $vatNumber): bool
    {
        return (bool) preg_match(self::VAT_NUMBER_PATTERN, $vatNumber);
    }

    private function isVatNumberChecksumValidationPassed(string $vatNumber): bool
    {
        $vatNumberDigits = $this->getVatNumberDigits($vatNumber);
        $checkingVatNumberDigits = array_slice(
            $vatNumberDigits,
            0,
            self::CHECKING_VAT_NUMBER_DIGITS_FROM_START_COUNT
        );
        $checkingVatNumberDigitsMultipliedByWeightFactor = $this->getCheckingVatNumberDigitsMultipliedByWeightFactor(
            $checkingVatNumberDigits,
            self::CHECKSUM_WEIGHTING_FACTORS
        );
        $checkingVatNumberDigitsMultipliedByWeightFactorSum = array_sum($checkingVatNumberDigitsMultipliedByWeightFactor);
        $checkSumDigit = 11 - $checkingVatNumberDigitsMultipliedByWeightFactorSum % 11;

        return end($vatNumberDigits) === $checkSumDigit;
    }

    /**
     * @param int[] $checkingVatNumberDigits
     * @param int[] $checksumWeightingFactors
     * @return int[]
     */
    private function getCheckingVatNumberDigitsMultipliedByWeightFactor(
        array $checkingVatNumberDigits,
        array $checksumWeightingFactors
    ): array {
        return array_map(
            static function (int $vatNumberDigit, int $checksumWeightingFactor): int {
                return $vatNumberDigit * $checksumWeightingFactor;
            },
            $checkingVatNumberDigits,
            $checksumWeightingFactors
        );
    }

    /**
     * @param string $vatNumber
     * @return int[]
     */
    private function getVatNumberDigits(string $vatNumber): array
    {
        return array_map(
            static function (string $digitString): int {
                return (int) $digitString;
            },
            str_split(
                preg_replace(
                    '/\D/',
                    '',
                    $vatNumber
                )
            )
        );
    }
}
