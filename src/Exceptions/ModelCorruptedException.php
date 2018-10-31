<?php

namespace M1guelpf\EloquentImmutable\Exception;

class ModelCorruptedException extends \RuntimeException
{
    protected $message = 'The model you are trying to retrieve has been corrupted.';
}
