<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Actions, Categories};
use Illuminate\Support\Facades\Validator;
class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actions = Actions::with('categories')->get();
        //dd($actions);
        return view('action/actionIndex', compact('actions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        if (empty($categories)){
          
            return redirect()->back()->with('message', 'Erro na insercao');

        }
        //dd($categories);
        return view('action/actionCreate', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->except(['_token']));
        $validate = Validator::make(
            $request->all(),
            [
                'title' => 'required|max:30|min:3',
                'description' => 'required|min:7',
                'points' => 'required|numeric'
            ],
            [
                'title.required' => 'O nome deve ser preenchido',
                'title.max' => 'O tamanho máximo é 30 caracteres',
                'title.min' => 'O tamanho mínimo é 3 caracteres',
                'description.required' => 'A descrição deve ser preenchida',
                'description.min' => 'A descrição deve ter no mínimo 7 caracteres',
                'points.numeric'=>'A pontuação deve ser um número'
            ]
        );
        if ($validate->fails()) {
            return redirect()->back()
                ->withErrors($validate)
                ->withInput();
        } else {
           
            $create = Actions::create($request->except(['_token']));
            if ($create) {
                return redirect()->route('action.index');
            } else {
                return redirect()->back()->with('message', 'Erro na insercao');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $action = Actions::findOrFail($id);
        $categories = Categories::all();
        $category_id = Categories::findOrFail($action->category_id);
      
        return view("action/actionEdit", compact('action','categories','category_id'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $action = Actions::findOrFail($id);
        $update = $action->update($request->except(['_token', '_method']));
        if ($update) {
            return redirect()->route('action.index');
        } else {
            return redirect()->back()->with('message', 'Erro na atualizacao');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
