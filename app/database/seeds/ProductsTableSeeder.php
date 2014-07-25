<?php

class ProductsTableSeeder extends Seeder {

     public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	// DB::table('products')->delete();

        $products = array(
		array(
        'pro_name'    => 'x1',
		'cat_id'  	=>1,
		'sku'		=> 'sss',
        'pro_description'   => 'Lorem ipsum Reprehenderit velit est irure in enim in magna aute occaecat qui velit ad.',
		'pro_price'  	=>1,
		'pro_status'  	=>1,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ),
      array(
        'pro_name'    => 'a1',
		'cat_id'  	=>1,
		'sku'		=> 'aas',
        'pro_description'   => 'Lorem ipsum Reprehenderit velit est irure in enim in magna aute occaecat qui velit ad.',
		'pro_price'  	=>2,
		'pro_status'  	=>1,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      )
        );

		//truncate the posts table each time we seed
		DB::table('products')->truncate();
		DB::table('products')->insert($products);
	}

}