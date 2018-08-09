<?php

namespace App\Validator\Constraints;

use App\Validator\UniqueEmailValidator;
use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class UniqueEmail extends Constraint
{
    public function validatedBy()
    {
        return UniqueEmailValidator::class;
    }
}
