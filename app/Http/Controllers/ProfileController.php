<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user):View
    {
        $user->load('articles.media');

        return view('profile.show', compact('user'));
    }
}
