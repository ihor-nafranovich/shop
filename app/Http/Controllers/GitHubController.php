<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class GitHubController extends Controller {
    public function redirect() {
        return Socialite::driver('github')->redirect();
    }

    // Обработка редиректа с GitHub
    public function callback() {
        $githubUser = Socialite::driver('github')->user();

        // Проверка, существует ли пользователь в БД
        $user = User::where('github_id', $githubUser->getId())->first();

        if (!$user) {
            // Если нет — создаем нового пользователя
            $user = User::create([
                'name' => $githubUser->getName(),
                'email' => $githubUser->getEmail(),
                'github_id' => $githubUser->getId(),
                // Добавьте другие поля (например, avatar)
            ]);
        }

        Auth::login($user);
        return redirect('/');
    }
}
