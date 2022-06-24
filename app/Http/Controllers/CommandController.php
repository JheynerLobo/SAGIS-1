<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Artisan;

class CommandController extends Controller
{

    public function runOptimize()
    {
        try {
            Artisan::call('optimize');

            return 'Optimized!';
        } catch (Exception $th) {
            return $th->getMessage();
        }
    }

    public function runMigrateFresh()
    {
        try {
            Artisan::call('migrate:fresh', [
                '--seed' => true
            ]);
        } catch (Exception $th) {
            return $th->getMessage();
        }
    }
}
