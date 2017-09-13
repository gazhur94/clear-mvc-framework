<?php

Route::get('/', ['HomeController', 'getMain'])->name('home');

Route::get('auth/signin', ['AuthController', 'getSignIn'])->name('signin');

Route::get('auth/signup', ['AuthController', 'getSignUp'])->name('signup');

Route::get('auth/signout', ['AuthController', 'getSignOut'])->name('signout');

Route::post('auth/signup', ['AuthController', 'postSignUp']);

Route::post('auth/signin', ['AuthController', 'postSignIn']);
//Route::post('auth/signup', ['AuthController', 'postSignUp'])->middleware('csrf');