<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\ServiceProvider;
use App\Models\Category;

class ServiceProviderScopeTest extends TestCase
{
    use RefreshDatabase;

    public function test_filter_by_category_scope()
    {
        $cat1 = Category::factory()->create();
        $cat2 = Category::factory()->create();

        ServiceProvider::factory()->count(2)->create(['category_id' => $cat1->id]);
        ServiceProvider::factory()->count(3)->create(['category_id' => $cat2->id]);

        $filtered = ServiceProvider::filterByCategory($cat1->id)->get();

        $this->assertCount(2, $filtered);
        $this->assertTrue($filtered->every(fn ($p) => $p->category_id === $cat1->id));
    }
}
