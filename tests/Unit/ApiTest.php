<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Order;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateUser()
    {
        $userData = [
            'name' => 'John Doe',
        ];

        $response = $this->json('POST', '/api/users/store', $userData);

        $response->assertStatus(201)
            ->assertJson([
                'name' => 'John Doe',
            ]);

        $this->assertDatabaseHas('users', $userData);
    }

    public function testCreateOrder()
    {
        $user = User::factory()->create();

        $orderData = [
            'user_id' => $user->id,
            'date' => '2023-05-26',
            'total_value' => 100.00,
        ];

        $response = $this->json('POST', '/api/orders', $orderData);

        $response->assertStatus(201)
            ->assertJson($orderData);

        $this->assertDatabaseHas('orders', $orderData);
    }

    public function testGetUser()
    {
        $user = User::factory()->create();

        $response = $this->json('GET', '/api/users/show/' . $user->id);

        $response->assertStatus(200)
            ->assertJson([
                'id' => $user->id,
                'name' => $user->name,
            ]);
    }

    public function testUpdateUser()
    {
        $user = User::factory()->create();

        $updatedData = [
            'name' => 'Updated Name',
        ];

        $response = $this->json('PUT', '/api/users/' . $user->id, $updatedData);

        $response->assertStatus(200)
            ->assertJson($updatedData);

        $this->assertDatabaseHas('users', $updatedData);
    }

    public function testGetUserOrders()
    {
        $user = User::factory()->create();
        $order1 = Order::factory()->create([
            'user_id' => $user->id,
            'total_value' => 100.00,
        ]);
        $order2 = Order::factory()->create([
            'user_id' => $user->id,
            'total_value' => 200.00,
        ]);

        $response = $this->json('GET', '/api/users/' . $user->id . '/orders');

        $response->assertStatus(200)
            ->assertJson([
                'orders' => [
                    [
                        'id' => $order1->id,
                        'user_id' => $user->id,
                        'date' => $order1->date->format('Y-m-d'),
                        'total_value' => $order1->total_value,
                    ],
                    [
                        'id' => $order2->id,
                        'user_id' => $user->id,
                        'date' => $order2->date->format('Y-m-d'),
                        'total_value' => $order2->total_value,
                    ],
                ],
                'total_value' => 300.00,
            ]);
    }
}
