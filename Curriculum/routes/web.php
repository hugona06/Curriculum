<?php

use App\Http\Controllers\CurriculumController;

Route::get('/', function () {
    return redirect()->route('curriculums.index');
});

Route::resource('curriculums', CurriculumController::class);