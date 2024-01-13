<?php

use App\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'title' => 'Blog Title',
        'description' => 'Description about the blog',
    ];
});
