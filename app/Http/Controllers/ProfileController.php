<?php /** @noinspection PhpUndefinedFieldInspection */

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {
    public function edit(): Renderable {
        return view('user.profile_details', ['user' => Auth::user()]);
    }

    public function update(Request $request): ?RedirectResponse {
        $request->validate([
            'name' => 'nullable|min:3|max:250',
            'email' => 'nullable|unique:users|max:250',
        ]);

        if (!Auth::check())
            return null;

        $user = Auth::user();

        if ($request->input('email')) {
            User::where('email', $user->email)->update(['email' => $request->email]);
        }

        if ($request->input('name')) {
            User::where('name', $user->name)->update(['name' => $request->name]);
        }

        return back();
    }
}
