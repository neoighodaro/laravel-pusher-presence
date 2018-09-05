<?php

namespace App\Http\Controllers;

use App\Update;
use App\User;
use Illuminate\Http\Request;
use App\Events\UpdateCreated;

class UpdatesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('updates');
    }

    public function create(Request $request)
    {
        $data = $request->validate(['text' => 'required|min:1|max:280|string']);

        $update = auth()->user()->updates()->save(new Update($data))->load('user');

        broadcast(new UpdateCreated($update))->toOthers();

        return response()->json($update);
    }

    public function list()
    {
        return response()->json(Update::latest()->with('user')->limit(15)->get());
    }

    public function userSuggestions()
    {
        $user = auth()->user();

        return response()->json(
            User::where('id', '!=', $user->id)->inRandomOrder()->limit(5)->get()
        );
    }
}
