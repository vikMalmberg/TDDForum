<?php

namespace App\Http\Controllers;
use App\Thread;
use Illuminate\Http\Request;
Use App\Reply;


class RepliesController extends Controller
{
   /**
     * Create a new RepliesController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store($channelId, Thread $thread)
    {
        $this->validate(request(), ['body' => 'required']);

        $thread->addReply([
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);

        return back()->with('flash', 'a b c.');

    }

    public function destroy(Reply $reply)
    {
          $this->authorize('update', $reply);

        $reply->delete();

        return back();

    }
}
