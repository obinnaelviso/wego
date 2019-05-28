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
        factory(App\Model\Customer::class, 50)->create();
        factory(App\Model\CarCategory::class, 5)->create();
        factory(App\Model\Admin::class, 10)->create();
        factory(App\Model\CarModel::class, 10)->create();
        factory(App\Model\Car::class, 50)->create();
        factory(App\Model\BookingTime::class, 2)->create();
        factory(App\Model\Booking::class, 200)->create();
        factory(App\Model\ExtraHour::class, 150)->create();
        factory(App\Model\Review::class, 100)->create();
        factory(App\Model\NotificationType::class, 10)->create();
        factory(App\Model\Notification::class, 150)->create();
        factory(App\Model\Point::class, 20)->create();
        factory(App\Model\Voucher::class, 50)->create();
        factory(App\Model\Driver::class, 10)->create();
        factory(App\Model\Location::class, 15)->create();
        factory(App\Model\FrontdeskAdmin::class, 10)->create();
        factory(App\Model\IssuedVoucher::class, 50)->create();
        factory(App\Model\DriverLocation::class, 10)->create();
    }
}
