<?php

use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            User::create([
                'nickname' => 'Jack',
                'username' => 'jack',
                'password' => 'password',
                'email' => 'admin@jackd.io',
                'telephone' => '15888888888',
                'status' => User::STATUS_NORMAL,
                'avatar' => 'no-avatar.png'
            ]);
            User::create([
                'nickname' => 'Cherry',
                'username' => 'cherry',
                'password' => 'password',
                'email' => 'cherry@jackd.io',
                'telephone' => '13888888888',
                'status' => User::STATUS_NORMAL,
                'avatar' => 'no-avatar.png'
            ]);
        } catch (Exception $exception) {
            Log::error($exception);
        }
    }
}
