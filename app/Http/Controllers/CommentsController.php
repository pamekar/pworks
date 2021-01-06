<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\CommentsManager;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    use CommentsManager;

    /**
     * Display a listing of the users.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('welcome', ['users' => \App\Models\User::orderBy('id')->get()]);
    }

    /**
     * Show the form for creating a new comment.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created comment in storage.
     *
     * <p>Request Payload</p>
     * <pre>
     * [
     *      'id' => 'required|integer|min:1',
     *      'password' => 'required|string|max:255',
     *      'comment' => 'required|string'
     * ]
     * </pre
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|min:1',
            'password' => 'required|string|max:255',
            'comment' => 'required|string'
        ]);

        if ($request->get('password') === '720DF6C2482218518FA20FDC52D4DED7ECC043AB') {
            $user = $this->storeComment($request->get('id'), $request->get('comment'));

            return redirect()->route('comments.show', ['comment' => $user->id]);
        }
        abort(401);
    }

    /**
     * Display the specified users comments.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('comments.index', ['user' => $user]);
    }
}
