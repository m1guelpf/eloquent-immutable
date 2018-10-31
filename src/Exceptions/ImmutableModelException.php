<?php

namespace M1guelpf\EloquentImmutable\Exception;

class ImmutableModelException extends \RuntimeException
{
    protected $message = 'You are trying to alter a Model that has been defined as immutable.';
}
