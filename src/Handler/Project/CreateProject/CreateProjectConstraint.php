<?php

declare(strict_types=1);

namespace App\Handler\Project\CreateProject;

use App\Util\Validator\ValidatorConstraintsInterface;
use Symfony\Component\Validator\Constraints as Assert;

class CreateProjectConstraint implements ValidatorConstraintsInterface
{
    public function constraints(): Assert\Collection
    {
        return new Assert\Collection(
            [
            'name' => new Assert\Required(
                [
                new Assert\NotBlank()
                ]
            )
            ]
        );
    }
}
