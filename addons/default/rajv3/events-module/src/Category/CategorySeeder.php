<?php namespace Rajv3\EventsModule\Category;

use Anomaly\Streams\Platform\Database\Seeder\Seeder;

class CategorySeeder extends Seeder
{

    //https://pyrocms.com/documentation/streams-platform/1.6/database/seeding
    protected $category;

    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->category = $category;
    }

    public function run()
    {
//        $this->category->create(
//            [
//                'name' => 'Test category',
//                'en'           => [
//                    'name' => 'Test category',
//                ],
//                'slug'         => 'test-slug', 
//            ]
//        );

        DB::table('event_categories')->insert([
            'name' => 'Test category',
            'email' => 'test-cat', 
        ]); 
        
    }
}
