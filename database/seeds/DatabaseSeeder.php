<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\Model\Customer::class,50)->create();
        factory(App\Model\CarCategory::class,5)->create();
        factory(App\Model\Admin::class,10)->create();
        factory(App\Model\CarModel::class,10)->create();
        factory(App\Model\Car::class,50)->create();
        factory(App\Model\BookingTime::class,2)->create();
        factory(App\Model\Booking::class,200)->create();
        factory(App\Model\ExtraHour::class,30)->create();
        factory(App\Model\Review::class,250)->create();
    }
}
