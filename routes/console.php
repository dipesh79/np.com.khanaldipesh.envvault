<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('queue:work --stop-when-empty')
    ->everyFiveSeconds()
    ->withoutOverlapping(10)
    ->name('Queue Worker for Default Queue');
