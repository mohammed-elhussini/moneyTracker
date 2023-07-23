<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Transaction::factory(10)->create();
        Transaction::factory(10)->create()->each(function ($transaction) {
            // Assign random categories to each transaction
            $categories = Category::inRandomOrder()->limit(3)->pluck('id');
            $transaction->categories()->sync($categories);
        });
    }
}
