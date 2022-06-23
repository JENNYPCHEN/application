<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;

class QuestionTest extends ApiTestCase
{
    public function testGetCollection(): void
    {
        $response = static::createClient()->request('GET', '/api/questions');

        $this->assertResponseIsSuccessful();
        
        $this->assertCount(6,$response->toArray()["hydra:member"]);
    }

    public function testUpdateQuestion(): void
    {
        $response = static::createClient()->request('PUT', '/api/questions/20',['json'=>[
        'question'=>"May I have it refunded if I change your mind ?"]]);

        $this->assertResponseIsSuccessful();
        $this->assertJsonContains([
            '@id'=>"/api/questions/20",
            'question'=>"May I have it refunded if I change your mind ?"
        ]);
        
    }
}
