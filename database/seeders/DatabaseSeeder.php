<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\SanPham;
use App\Models\Donhang;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'MQ',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(123456) ,
            'remember_token' => '1234567890',
            'role' => '1',
            'SDT' => '01234567891',
            'Address' => 'AAA at BBB',
            'avatar' => 'https://quanlybanhangapi.herokuapp.com/public/avatar/default.png',
        ]);
        $this->call(SanPhamSeeder::class);
        User::factory(20)->create()->each(function($user) {
            $sanphams = SanPham::all();
            Donhang::factory(rand(1, 20))->create([
                'user_id' => $user->id
            ])->each(function($dh) use($sanphams)
            {
                $dh->sanphams()->attach(
                    $sanphams->random(rand(1,$sanphams->count()))->pluck('id')->toArray(),
                    ['amount' => rand(1,50)]
                );
            }
            );
        });
    }
}
