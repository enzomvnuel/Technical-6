<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('pos:about', function () {
    $this->comment('POS Foundations Laravel application is ready.');
})->purpose('Display a short project status message');
