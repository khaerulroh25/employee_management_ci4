<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Test',
                'email' => 'test@mail.com',
                'password' => password_hash('25januari', PASSWORD_DEFAULT),
            ],
            [
                'name' => 'test2',
                'email' => 'test2@mail.com',
                'password' => password_hash('25januari', PASSWORD_DEFAULT),
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
