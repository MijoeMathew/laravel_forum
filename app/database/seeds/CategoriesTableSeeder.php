<?php

class CategoriesTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	// DB::table('categories')->delete();

        $categories = array(
		array(
        'cat_name'    => 'Cat1',
        'cat_description'   => 'Lorem ipsum Reprehenderit velit est irure in enim in magna aute occaecat qui velit ad.',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'cat_name'    => 'Cat2',
        'cat_description'   => 'Lorem ipsum Reprehenderit velit est irure in enim in magna aute occaecat qui velit ad.',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      )
        );

		//truncate the posts table each time we seed
		DB::table('categories')->truncate();
		DB::table('categories')->insert($categories);
	}

}