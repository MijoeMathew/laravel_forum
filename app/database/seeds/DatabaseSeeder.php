<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('PostsTableSeeder');
		$this->call('CommentsTableSeeder');

		$this->call('CategoriesTableSeeder');
		$this->call('ProductsTableSeeder');
		$this->call('PostsTableSeeder');
	}

}