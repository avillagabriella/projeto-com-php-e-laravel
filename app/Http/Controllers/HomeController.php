<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the user's info.
     *
     * @return Renderable
     */
    public function index()
    {

        $merchandises = Merchandise::get();
        
        return view('principal.index',compact('merchandises'));
    }

    public function produto($id)
    {

        $merchandise = Merchandise::find($id);
        
        return view('principal.produto',compact('merchandise'));
    }

    /**
     * Updates current user info
     *
     * @param Request $request
     * @return RedirectResponse
     */

}
