<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use App\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = database_path('seeds\seeder_csv\book_seeder.csv');
        Excel::load($contents)->each(function (Collection $csvLine) {
            $book = Book::firstOrNew([
                'title' => $csvLine->get('title'),
                'description' => $csvLine->get('description'),
                'author'=>$csvLine->get('author')
            ]);
            $book->save();

    	});
    }
}
