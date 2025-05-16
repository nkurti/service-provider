<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Category;
use App\Models\ServiceProvider;

class ServiceProviderApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_returns_paginated_providers()
    {
        ServiceProvider::factory()->count(12)->create();

        $response = $this->getJson('/api/providers');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data',
            'links',
            'meta'
        ]);
        $this->assertCount(8, $response->json('data'));
    }

    public function test_it_filters_providers_by_category()
    {
        $categoryA = Category::factory()->create();
        $categoryB = Category::factory()->create();

        ServiceProvider::factory()->count(3)->create(['category_id' => $categoryA->id]);
        ServiceProvider::factory()->count(2)->create(['category_id' => $categoryB->id]);

        $response = $this->getJson('/api/providers?category_id=' . $categoryA->id);

        $response->assertStatus(200);
        $this->assertCount(3, $response->json('data'));
    }


    public function test_it_returns_provider_profile()
{
    $provider = ServiceProvider::factory()->create();

    $response = $this->getJson("/api/providers/{$provider->id}");

    $response->assertStatus(200);
    $response->assertJson([
        'id' => $provider->id,
        'name' => $provider->name,
    ]);
}
}
