<?php

namespace App\Validator;

use App\Document\User;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class UniqueEmailValidator extends ConstraintValidator
{
    /**
     * @var ObjectManager
     */
    private $objectManager;

    /**
     * UniqueEmailValidator constructor.
     *
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * @inheritDoc
     */
    public function validate($value, Constraint $constraint)
    {
        if (null === $value || '' === $value) {
            return;
        }

        if (!is_string($value)) {
            throw new UnexpectedTypeException($value, 'string');
        }


        $result = $this->objectManager
            ->getRepository(User::class)
            ->findOneBy(
                [
                    'email' => $value
                ]
            );

        if (null !== $result) {
            $this->context->buildViolation('An email '.$value.' is already in use')
                ->addViolation();
        }
    }
}
