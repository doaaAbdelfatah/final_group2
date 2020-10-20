<?php

namespace Database\Factories;

use App\Models\Contacts;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contacts::class;
    
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $typeList =[1,2,3];
        $type = array_rand($typeList , 1);
        switch($typeList[$type]){
            case 1:
                return [
                    "contact_type_id"=> 1,
                    "contact" => $this->faker->unique()->email ,
                    "user_id" => $this->faker->numberBetween(1,10)
                ];
            break;
            case 2:
                return [
                    "contact_type_id"=> 2,
                    "contact" => $this->faker->unique()->phoneNumber ,
                    "user_id" => $this->faker->numberBetween(1,10)
                ];
            break;
            case 3:
                return [
                    "contact_type_id"=> 3,
                    "contact" => $this->faker->unique()->address ,
                    "user_id" => $this->faker->numberBetween(1,10)
                ];
            break;
        }

      
    }
}
