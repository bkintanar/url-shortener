<?php

namespace URLShortener\Http\Controllers;

use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use URLShortener\Http\Requests\LinkRequest;
use URLShortener\Link;

class LinksController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $auth = Auth::user();
        $links = Link::where('user_id', $auth->id)->get();

        return view('links.index', compact('links'));
    }

    public function update(Link $link)
    {
        $link->clicks += 1;
        $link->save();

        return redirect($link->original);
    }

    public function store(LinkRequest $request)
    {
        $validated = $request->validated();
        $validated['original'] = $validated['link'];

        $validated['shorten'] = substr(sha1($validated['original'] . Carbon::now()), 0, 8);

        $tags = get_meta_tags($validated['original']);

        if (array_key_exists('description', $tags)) {
            $validated['description'] =  urldecode($tags['description']);
        }

        Link::create($validated);

        return redirect('links')->with('status', 'Shorten link successfully created.');
    }

    public function create()
    {
        return view('links.create');
    }

    /**
     * @param Link $link
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function destroy(Link $link)
    {
        if ($link->user_id != Auth::user()->id) {
            throw new Exception('You can only delete links that you own.');
        }

        $link->delete();

        return redirect('links')->with('status', 'Shorten link successfully deleted.');
    }
}
