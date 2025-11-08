<?php

namespace App\Http\Controllers;

use App\Models\{UserActions, User, Actions};
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
        //modificar para que retorne o usuario logado
        //para que o proprio usuario realize o cadastro
        $user=User::all();
        $actions=Actions::all();
        return view('userAction/userActionCreate', compact('user', 'actions'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user'=>'required',
            'action'=>'required',
            'quantity'=>'required|integer|min:1',
            'date' => 'date'
        ]);
        
      UserActions::create([
        'user_id'=>$request->user,
        'action_id'=>$request->action,
        'quantity' => $request->quantity,
        'date'=>$request->date
      ]);
      return redirect()->route('useraction.index')->with('success', 'Ação do usuário registrada com sucesso!');
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
