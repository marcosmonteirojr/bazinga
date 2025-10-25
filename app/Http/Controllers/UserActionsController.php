<?php

namespace App\Http\Controllers;

use App\Models\UserActions;
use Illuminate\Http\Request;

class UserActionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userActions = UserActions::with(['user', 'action.categories'])->get();
        //dd($userActions[0]->user->name);
        return view('userAction/userActionIndex', compact('userActions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserActions $userActions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserActions $userActions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserActions $userActions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserActions $userActions)
    {
        //
    }
}
