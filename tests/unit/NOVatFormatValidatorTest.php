<?php

namespace rocketfellows\NOVatFormatValidator\tests\unit;

use PHPUnit\Framework\TestCase;

class NOVatFormatValidatorTest extends TestCase
{
    /**
     * @var NOVatFormatValidator
     */
    private $validator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->validator = new NOVatFormatValidator();
    }

    /**
     * @dataProvider getVatNumbersProvidedData
     */
    public function testValidationResult(string $vatNumber, bool $isValid): void
    {
        $this->assertEquals($isValid, $this->validator->isValid($vatNumber));
    }

    public function getVatNumbersProvidedData(): array
    {
        return [
            [
                'vatNumber' => 'NO234154877MVA',
                'isValid' => true,
            ],
            [
                'vatNumber' => 'NO234154877',
                'isValid' => true,
            ],
            [
                'vatNumber' => '234154877MVA',
                'isValid' => true,
            ],
            [
                'vatNumber' => '234154877',
                'isValid' => true,
            ],
            [
                'vatNumber' => 'NO974761076MVA',
                'isValid' => true,
            ],
            [
                'vatNumber' => 'NO974761076',
                'isValid' => true,
            ],
            [
                'vatNumber' => '974761076MVA',
                'isValid' => true,
            ],
            [
                'vatNumber' => '974761076',
                'isValid' => true,
            ],
            [
                'vatNumber' => 'NO999999999MVA',
                'isValid' => true,
            ],
            [
                'vatNumber' => 'NO999999999',
                'isValid' => true,
            ],
            [
                'vatNumber' => '999999999MVA',
                'isValid' => true,
            ],
            [
                'vatNumber' => '999999999',
                'isValid' => true,
            ],
            [
                'vatNumber' => 'NO895623032MVA',
                'isValid' => true,
            ],
            [
                'vatNumber' => 'NO895623032',
                'isValid' => true,
            ],
            [
                'vatNumber' => '895623032MVA',
                'isValid' => true,
            ],
            [
                'vatNumber' => '895623032',
                'isValid' => true,
            ],
            [
                'vatNumber' => 'NO911382008MVA',
                'isValid' => true,
            ],
            [
                'vatNumber' => 'NO911382008',
                'isValid' => true,
            ],
            [
                'vatNumber' => '911382008MVA',
                'isValid' => true,
            ],
            [
                'vatNumber' => '911382008',
                'isValid' => true,
            ],
            [
                'vatNumber' => 'NO234154879MVA',
                'isValid' => false,
            ],
            [
                'vatNumber' => 'NO234154879',
                'isValid' => false,
            ],
            [
                'vatNumber' => '234154879MVA',
                'isValid' => false,
            ],
            [
                'vatNumber' => '234154879',
                'isValid' => false,
            ],
            [
                'vatNumber' => 'NO974761078MVA',
                'isValid' => false,
            ],
            [
                'vatNumber' => 'NO974761078',
                'isValid' => false,
            ],
            [
                'vatNumber' => '974761078MVA',
                'isValid' => false,
            ],
            [
                'vatNumber' => '974761078',
                'isValid' => false,
            ],
            [
                'vatNumber' => 'NO999999998MVA',
                'isValid' => false,
            ],
            [
                'vatNumber' => 'NO999999998',
                'isValid' => false,
            ],
            [
                'vatNumber' => '999999998MVA',
                'isValid' => false,
            ],
            [
                'vatNumber' => '999999998',
                'isValid' => false,
            ],
            [
                'vatNumber' => 'NO895623031MVA',
                'isValid' => false,
            ],
            [
                'vatNumber' => 'NO895623031',
                'isValid' => false,
            ],
            [
                'vatNumber' => '895623031MVA',
                'isValid' => false,
            ],
            [
                'vatNumber' => '895623031',
                'isValid' => false,
            ],
            [
                'vatNumber' => 'NO911382009MVA',
                'isValid' => false,
            ],
            [
                'vatNumber' => 'NO911382009',
                'isValid' => false,
            ],
            [
                'vatNumber' => '911382009MVA',
                'isValid' => false,
            ],
            [
                'vatNumber' => '911382009',
                'isValid' => false,
            ],
            [
                'vatNumber' => 'NO9113820010MVA',
                'isValid' => false,
            ],
            [
                'vatNumber' => 'NO9113820010',
                'isValid' => false,
            ],
            [
                'vatNumber' => '9113820010MVA',
                'isValid' => false,
            ],
            [
                'vatNumber' => '9113820010',
                'isValid' => false,
            ],
            [
                'vatNumber' => '',
                'isValid' => false,
            ],
            [
                'vatNumber' => '0',
                'isValid' => false,
            ],
            [
                'vatNumber' => '1',
                'isValid' => false,
            ],
            [
                'vatNumber' => 'NO91138200MVA',
                'isValid' => false,
            ],
            [
                'vatNumber' => 'NO91138200',
                'isValid' => false,
            ],
            [
                'vatNumber' => '91138200MVA',
                'isValid' => false,
            ],
            [
                'vatNumber' => '91138200',
                'isValid' => false,
            ],
            [
                'vatNumber' => 'NO91138008MVA',
                'isValid' => false,
            ],
            [
                'vatNumber' => 'NO91138008',
                'isValid' => false,
            ],
            [
                'vatNumber' => '91138008MVA',
                'isValid' => false,
            ],
            [
                'vatNumber' => '91138008',
                'isValid' => false,
            ],
        ];
    }
}
