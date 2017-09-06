<?php

Route::get('/', ['HomeController', 'getMain'])->middleware('TestMiddleware');
//Route::get('/', 'asd'); //throwing exception

//Route::get('/id/{userId}/photo{photoId}', ['HomeController', 'getMain']);



