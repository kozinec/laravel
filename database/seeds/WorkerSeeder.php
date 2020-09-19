<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;

class WorkerSeeder extends Seeder
{
    public function run()
    {
        factory(Worker::class, 100)->create()->each(function (Worker $worker) {
            $worker->profile()->save(
                factory(WorkerProfile::class)->make()
            );
        });
    }
}

