<?php

use Illuminate\Database\Seeder;
use App\Department;
class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	factory(App\Department::class, 3)->create()->each(function($department) {
       		factory(App\Staff::class, 10)->create([
       			'department_id' => $department->id,
       		]);
       	});
    }
}
?>
