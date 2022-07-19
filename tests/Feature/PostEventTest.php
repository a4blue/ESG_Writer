<?php

use Osteel\OpenApi\Testing\Exceptions\ValidationException;
use Osteel\OpenApi\Testing\ValidatorBuilder;
use Tests\TestCase;

class PostEventTest extends TestCase
{
    /**
     * @throws ValidationException
     */
    public function testPostEvent(): void
    {
        $response = $this->post('/api/event', ['body' => '']);
        $validator = ValidatorBuilder::fromYaml(storage_path('api-docs/api-docs.yaml'))->getValidator();
        $result = $validator->validate($response->baseResponse, '/api/event', 'post');

        $this->assertTrue($result);
    }
}
