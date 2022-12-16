<?php

namespace App\Traits;

trait MaintananceTypes
{
    public function maintanance(): array
    {
        return ([
            'oil',
            'tires',
            'suspension',
            'brakes',
            'full review'
        ]);
    }
}
