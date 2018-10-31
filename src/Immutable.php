<?php

namespace M1guelpf\LaravelImmutable;

use Illuminate\Database\Eloquent\Model;
use M1guelpf\EloquentImmutable\Exception\ImmutableModelException;
use M1guelpf\EloquentImmutable\Exception\ModelCorruptedException;

trait Immutable
{
    protected static $immutableCheck = false;

    public function bootImmutableTrait()
    {
        foreach (['updating', 'deleting', 'restoring'] as $event) {
            static::registerModelEvent($event, function () {
                throw new ImmutableModelException;
            });
        }

        if (static::$immutableCheck) {
            static::creating(function (Model $model) {
                $model->{$model->getHashKey()} = sha1(serialize(array_except($this->attributes, [$model->getHashKey()])));
            });

            static::retrieved(function (Model $model) {
                if (! $model->{$model->getHashKey()} == sha1(serialize(array_except($model->attributes, [$model->getHashKey()])))) {
                    throw new ModelCorruptedException;
                }
            });
        }
    }

    protected function getHashKey() : string
    {
        return 'hash';
    }
}
