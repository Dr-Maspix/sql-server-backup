<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');


    $process = Process::fromShellCommandline('ls -all');

    $process->run();

    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }

    echo $process->getOutput();


   /* $process = new Process(['ls', '-all']);
    $process->run();

    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }

    echo $process->getOutput();*/

});
