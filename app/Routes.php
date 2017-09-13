<?php

Route::get('/', ['HomeController', 'getMain'])->name('home');

Route::get('/auth/signin', ['AuthController', 'getSignIn'])->name('signin')->middleware('guest')->title(['en' => 'Sign In']);

Route::get('/auth/signup', ['AuthController', 'getSignUp'])->name('signup')->middleware('guest')->title(['en' => 'Sign Up']);;

Route::get('/auth/signout', ['AuthController', 'getSignOut'])->name('signout')->middleware('auth');

Route::post('/auth/signup', ['AuthController', 'postSignUp'])->middleware('guest', 'csrf');

Route::post('/auth/signin', ['AuthController', 'postSignIn'])->middleware('guest', 'csrf');