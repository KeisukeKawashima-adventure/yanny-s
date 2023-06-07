<?php

declare(strict_types=1);

namespace App\Domain\Models\SmokingSpot\ValueObjects;

use InvalidArgumentException;

class SmokingSpotType {

    /** @var array VALID_TYPES 喫煙所の有効なタイプ */
    private const VALID_TYPES = ['outdoor', 'indoor', 'cafe', 'restaurant', 'general_smoking_area'];

    /** @var string $smokingSpotType　喫煙所タイプ */
    private $smokingSpotType;

    /**
     * Constructor
     * 
     * @var string $value 
     * @throws InvalidArgumentException
     */
    public function __construct(string $value)
    {
        if (!in_array($value, self::VALID_TYPES)) {
            throw new InvalidArgumentException('喫煙所タイプは次のいずれかを指定してください: ' . implode(', ', self::VALID_TYPES));
        }
        $this->smokingSpotType = $value;
    }

    /**
     * Get the value of smokingSpotType
     * 
     * @return string $smokingSpotType 喫煙所タイプ
     */
    public function getValue() : string
    {
        return $this->smokingSpotType;
    }

    /**
     * Compare two SmokingSpotType objects for equality
     * @param SmokingSpotType $smokingSpotType
     * @return bool
     */
    public function equals(SmokingSpotType $smokingSpotType): bool
    {
        return $this->smokingSpotType === $smokingSpotType->getValue();
    }
}
