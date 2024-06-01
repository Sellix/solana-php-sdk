<?php

namespace Tighten\SolanaPhpSdk\Programs;

use Tighten\SolanaPhpSdk\Program;
use Tighten\SolanaPhpSdk\TransactionInstruction;
use Tighten\SolanaPhpSdk\PublicKey;

class ComputeBudgetProgram extends Program
{
    public const programId = 'ComputeBudget111111111111111111111111111111';

    static function programId(): PublicKey
    {
        return new PublicKey(static::programId);
    }

    static function setComputeUnitLimit($units)
    {
        $data = [
            // uint8
            ...unpack("C*", pack("C", 2)),
            // uint32
            ...unpack("C*", pack("V", $units)),
        ];
        return new TransactionInstruction(
            static::programId(),
            [],
            $data,
        );
    }

    static function setComputeUnitPrice($microLamports)
    {
        $data = [
            // uint8
            ...unpack("C*", pack("C", 3)),
            // uint64
            ...unpack("C*", pack("P", $microLamports)),
        ];
        return new TransactionInstruction(
            static::programId(),
            [],
            $data,
        );
    }
}
