<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_store_validation_errors()
    {
        $this->actingAs($this->user);

        $response = $this->post('/contacts', [
            'email' => 'test@example.com',
            'contact' => '123456789',
        ]);
        $response->assertSessionHasErrors('name');

        $response = $this->post('/contacts', [
            'name' => 'John',
            'email' => 'test@example.com',
            'contact' => '123456789',
        ]);
        $response->assertSessionHasErrors('name');

        $response = $this->post('/contacts', [
            'name' => 'John Doe',
            'email' => 'invalid-email',
            'contact' => '123456789',
        ]);
        $response->assertSessionHasErrors('email');

        Contact::create([
            'name' => 'Existing',
            'email' => 'test@example.com',
            'contact' => '987654321',
        ]);
        $response = $this->post('/contacts', [
            'name' => 'John Doe',
            'email' => 'test@example.com',
            'contact' => '123456789',
        ]);
        $response->assertSessionHasErrors('email');

        $response = $this->post('/contacts', [
            'name' => 'John Doe',
            'email' => 'test@example.com',
            'contact' => '123',
        ]);
        $response->assertSessionHasErrors('contact');

        $response = $this->post('/contacts', [
            'name' => 'John Doe',
            'email' => 'new@example.com',
            'contact' => '987654321',
        ]);
        $response->assertSessionHasErrors('contact');
    }

    public function test_update_validation_errors()
    {
        $this->actingAs($this->user);

        $contact = Contact::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'contact' => '123456789',
        ]);

        $response = $this->put("/contacts/{$contact->id}", [
            'email' => 'john@example.com',
            'contact' => '123456789',
        ]);
        $response->assertSessionHasErrors('name');

        $response = $this->put("/contacts/{$contact->id}", [
            'name' => 'John',
            'email' => 'john@example.com',
            'contact' => '123456789',
        ]);
        $response->assertSessionHasErrors('name');

        $response = $this->put("/contacts/{$contact->id}", [
            'name' => 'John Doe',
            'email' => 'invalid-email',
            'contact' => '123456789',
        ]);
        $response->assertSessionHasErrors('email');

        Contact::create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'contact' => '987654321',
        ]);
        $response = $this->put("/contacts/{$contact->id}", [
            'name' => 'John Doe',
            'email' => 'jane@example.com',
            'contact' => '123456789',
        ]);
        $response->assertSessionHasErrors('email');

        $response = $this->put("/contacts/{$contact->id}", [
            'name' => 'John Doe',
            'email' => 'jane@example.com',
            'contact' => '123',
        ]);
        $response->assertSessionHasErrors('contact');

        $response = $this->put("/contacts/{$contact->id}", [
            'name' => 'John Doe',
            'email' => 'jane@example.com',
            'contact' => '987654321',
        ]);
        $response->assertSessionHasErrors('contact');
    }
}
