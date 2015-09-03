<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TranslateControllerTest extends TestCase
{
    public function testValidCase()
    {
        $response = $this->call('GET', '/?source_language=en&target_language=ru&word=cat', [], [], [], []);
        $this->assertEquals(200, $response->getStatusCode());
        $data = json_decode($response->getContent())->data;
        $this->assertEquals('koshka', $data->result);
        $this->assertEquals('en', $data->source);
        $this->assertEquals('ru', $data->target);
        $this->assertEquals('cat', $data->word);
    }

    public function testUppercase()
    {
        $response = $this->call('GET', '/?source_language=en&target_language=ru&word=Cat', [], [], [], []);
        $this->assertEquals(200, $response->getStatusCode());
        $data = json_decode($response->getContent())->data;
        $this->assertEquals('Koshka', $data->result);
        $this->assertEquals('en', $data->source);
        $this->assertEquals('ru', $data->target);
        $this->assertEquals('Cat', $data->word);
    }

    public function testValidation()
    {
        $response = $this->call('GET', '/', [''], [], [], []);
        $this->assertEquals(404, $response->getStatusCode());
        $error = json_decode($response->getContent(), true)['error'];
        $this->assertArrayHasKey('word', $error);
        $this->assertArrayHasKey('source_language', $error);
        $this->assertArrayHasKey('target_language', $error);
    }

    public function testNoTranslation()
    {
        $response = $this->call('GET', '/?source_language=en&target_language=ru&word=Cattttt', [], [], [], []);
        $this->assertEquals(404, $response->getStatusCode());
        $error = json_decode($response->getContent())->error;
        $this->assertEquals('Not found', $error);
    }
}
