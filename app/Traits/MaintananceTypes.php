<?php

namespace App\Traits;

trait MaintananceTypes
{
    public function maintanancetypes(): array
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
