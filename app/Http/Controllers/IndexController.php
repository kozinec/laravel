<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Facades\GenerateFacade;
use App\Models\User;
use App\Services\Generator;
use Illuminate\Support\Facades\Auth;

class IndexController
{
    public function __invoke()
    {
        $generator = new Generator();
//        $hash = $generator->generate();

        $hash = GenerateFacade::generate();

//        $user = Auth::user();
//
//        cache()->set('user', $user);
//
        /** @var User $cachedUser */
        $cachedUser = cache()->get('user');
//
//        Auth::logout();

        if($cachedUser) {
            Auth::login($cachedUser);
        }

        return view('welcome', compact('hash'));
    }
}
