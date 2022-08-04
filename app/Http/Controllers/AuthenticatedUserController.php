<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
// use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
// use Ramsey\Uuid\Uuid;

class AuthenticatedUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the user's info.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('me.index', ['user' => User::find(Auth::user()->id)]);
    }

    /**
     * Updates current user info
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), User::$updateRules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $validated = $validator->safe()->only([
            'name',
            'email',
            'phone_number',
            'birth_date',
        ]);

        $user = User::find(Auth::user()->id);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone_number = $validated['phone_number'];
        $user->birth_date = $validated['birth_date'];

        $user->save();
        $request->session()->regenerate();

        return redirect()->route('admin.index');
    }

}
   
