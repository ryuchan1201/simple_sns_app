<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tweet $tweet)
    {

        $tweets = Auth::user()->tweets;

        return view('tweet.index', ['tweets' => $tweets ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tweet.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'string|required|min:8',
        ]);

        Tweet::create([
            'text' => $request->text,
            'created_at' => now(),
            'updated_at' => now(),
            'user_id' => auth()->id()
        ]);

        return redirect('tweets')->with('success', 'Product created successfully.');;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tweet = Tweet::find($id);

        // dd($tweet->user->id);
        if ($tweet->user->id === Auth::user()->id) {
            # code...
        return view('tweet.show', ['tweet' => $tweet]);
        }

        return redirect('/tweets');
        // dd($tweet);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tweet $tweet)
    {
        $request->validate([
            'text' => "required"
        ]);

        $tweet->update($request->all());

        return redirect()->route('tweets.index')
        ->with('success', 'Product updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tweet = Tweet::find($id);

        $tweet->delete();

        return redirect('/tweets')->with('success', '見事に削除したよ');
    }
}
