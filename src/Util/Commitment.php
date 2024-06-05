<?php

declare(strict_types=1);

namespace MultipleChain\SolanaSDK\Util;

use MultipleChain\SolanaSDK\Exceptions\InputValidationException;

class Commitment
{
    public const FINALIZED = 'finalized';
    public const CONFIRMED = 'confirmed';
    public const PROCESSED = 'processed';

    protected string $commitmentLevel;

    /**
     * @param string $commitmentLevel
     */
    public function __construct(string $commitmentLevel)
    {
        if (
            ! in_array($commitmentLevel, [
            self::FINALIZED,
            self::CONFIRMED,
            self::PROCESSED,
            ])
        ) {
            throw new InputValidationException('Invalid commitment level.');
        }

        $this->commitmentLevel = $commitmentLevel;
    }

    /**
     * @return Commitment
     */
    public static function finalized(): Commitment
    {
        return new Commitment(static::FINALIZED);
    }

    /**
     * @return Commitment
     */
    public static function confirmed(): Commitment
    {
        return new Commitment(static::CONFIRMED);
    }

    /**
     * @return Commitment
     */
    public static function processed(): Commitment
    {
        return new Commitment(static::PROCESSED);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->commitmentLevel;
    }
}
