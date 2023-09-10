<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public readonly string $url;
    public function __construct(string $name)
    {
        $this->createApplication();
        parent::__construct($name);
        $this->url='http://localhost:8000/api/';
    }


}
