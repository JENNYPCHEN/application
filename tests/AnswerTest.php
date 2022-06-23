<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;

class AnswerTest extends ApiTestCase
{


    
    public function testGetCollection(): void
    {
        $response = static::createClient()->request('GET', '/api/answers');

        $this->assertResponseIsSuccessful();
        $this->assertJsonContains([
            "@context"=>"/api/contexts/Answer",
            "@id"=>"/api/answers",
            "@type"=> "hydra:Collection",
        ]);
        $this->assertCount(6,$response->toArray()["hydra:member"]);
    }
    
}
