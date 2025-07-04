<?php

namespace App\Services;

use App\Services\CustomLogServiceInterface;


class CustomLogDbService implements CustomLogServiceInterface
{

    /**
     * Create a new class instance.
     */
    protected $queryBuilder;
    public function __construct($queryBuilder)
    {
        //
        $this->queryBuilder = $queryBuilder;
    }

    public function rotateLogs()
    {
       $this->queryBuilder->where('id', '<', 1000)->delete();
    }
}
