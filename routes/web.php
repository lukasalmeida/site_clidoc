<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::get('/sitemap.xml', function () {
    return response()
        ->view('sitemap', ['url' => route('home')])
        ->header('Content-Type', 'application/xml; charset=UTF-8');
})->name('sitemap');
