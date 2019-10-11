<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Library\TestFactory;
use Tests\TestCase;

class TopicTest extends TestCase
{
    use RefreshDatabase;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->factory = new TestFactory();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_retrievied_topic_test()
    {
        $this->factory
            ->createTopic();

        $attributes = [
            'paginate' => 10,
            'page' => 1
        ];

        $response = $this->get('api/topic?' . http_build_query($attributes));

        $response->assertOk();

        $this->assertCount(1, $response->getOriginalContent() ['data']['topics']);
    }
}