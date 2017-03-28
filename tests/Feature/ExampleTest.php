<?php

namespace Tests\Feature;

use Tests\FeatureTestCase;

class ExampleTest extends FeatureTestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    function test_basic_test()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
