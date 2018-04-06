<?php declare(strict_types=1);


use Faker\Generator;
use Faker\ORM\Doctrine\Populator;
use Illuminate\Database\Seeder as IlluminateSeeder;
use LaravelDoctrine\ORM\Facades\EntityManager;

abstract class Seeder extends IlluminateSeeder
{
    /**
     * @var Generator
     */
    protected $faker;

    /**
     * @var Populator
     */
    protected $populator;

    public function __construct(Generator $faker)
    {
        $this->faker     = $faker;
        $this->populator = new Populator($faker, EntityManager::getFacadeRoot());
    }
}