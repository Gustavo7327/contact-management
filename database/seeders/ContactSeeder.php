<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'contact' => '1234567890',
        ]);

        Contact::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'contact' => '0987654321',
        ]);

        Contact::create([
            'name' => 'Bob Johnson',
            'email' => 'bob@example.com',
            'contact' => '1122334455',
        ]);
    }
}
