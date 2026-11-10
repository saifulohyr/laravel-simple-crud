<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login(): void
    {
        $this->get('/products')->assertRedirect(route('login'));
        $this->post('/products', [])->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_create_read_update_delete_product(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post('/products', [
                'name' => 'Mouse Wireless',
                'price' => 150000,
                'stock' => 12,
                'description' => 'USB receiver 2.4GHz',
            ])
            ->assertRedirect(route('products.index'));

        $this->assertDatabaseHas('products', [
            'name' => 'Mouse Wireless',
            'price' => 150000,
            'stock' => 12,
        ]);

        $product = Product::firstOrFail();

        $this->actingAs($user)
            ->get('/products')
            ->assertStatus(200)
            ->assertSee('Mouse Wireless');

        $this->actingAs($user)
            ->get('/products/create')
            ->assertStatus(200)
            ->assertSee('Tambah Produk');

        $this->actingAs($user)
            ->get("/products/{$product->id}/edit")
            ->assertStatus(200)
            ->assertSee('Edit Produk');

        $this->actingAs($user)
            ->put("/products/{$product->id}", [
                'name' => 'Mouse Wireless Pro',
                'price' => 225000,
                'stock' => 8,
                'description' => 'Dual mode',
            ])
            ->assertRedirect(route('products.index'));

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Mouse Wireless Pro',
            'price' => 225000,
            'stock' => 8,
        ]);

        $this->actingAs($user)
            ->delete("/products/{$product->id}")
            ->assertRedirect(route('products.index'));

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    public function test_search_filters_products(): void
    {
        $user = User::factory()->create();
        Product::create(['name' => 'Keyboard Mechanical', 'price' => 450000, 'stock' => 5]);
        Product::create(['name' => 'Monitor 24 Inch', 'price' => 1800000, 'stock' => 3]);

        $this->actingAs($user)
            ->get('/products?q=Keyboard')
            ->assertStatus(200)
            ->assertSee('Keyboard Mechanical')
            ->assertDontSee('Monitor 24 Inch');
    }
}
