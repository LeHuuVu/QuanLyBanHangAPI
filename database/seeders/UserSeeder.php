<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\SanPham;
use App\Models\Donhang;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
