<?php

namespace Tests\Feature;

use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class RemittanceTest extends TestCase
{

    public function test_the_remittance_returns_a_unprocessable_response(): void
    {
        $response = $this->post($this->url . 'remittance', [], [
            'Content-type' => 'application/json',
            'Accept' => 'application/json'
        ]);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }


    public function test_the_remittance_returns_a_created_response(): void
    {
        $data = [
            "amount" => "۵۰۰۰",
            "test" => "test",
            "from_card_number" => "6104337517593909",
            "to_card_number" => "6219861065883364"
        ];
        $response = $this->post($this->url . 'remittance', $data, [
            'Content-type' => 'application/json',
            'Accept' => 'application/json'
        ]);
        $response->assertStatus(Response::HTTP_CREATED);
    }

}
