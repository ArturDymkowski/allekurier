<?php

namespace App\Core\Invoice\Domain\Status;

enum InvoiceStatus: string
{
    case NEW = 'new';
    case PAID = 'paid';
    case CANCELED = 'canceled';

    public static function findByString(string $status): self|null
    {
        return match($status){
            'new' => self::NEW,
            'paid' => self::PAID,
            'canceled' => self::CANCELED,
            default => null
        };
    }
}
