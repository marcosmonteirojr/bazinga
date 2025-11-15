@extends('layout')
@section('content')
@if(session()->has('message'))
    {{session()->get('message')}}
@endif
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{route('useraction.update',$useractions->id)}}" method="POST">
@csrf
@method ('PUT')
    <legend>Editar Ação do usuário</legend>
    <div class="mb-3">
        <label for="user">Escolha um usuário:</label>
        <select class="form-select" aria-label="Default select example" name="user_id">
          <option value="{{$user->id}}">{{$user->name}}</option>
          @foreach($users as $us)
            <option value="{{$us->id}}">{{$us->name}}</option>
          @endforeach
        </select>
    </div>
    <div class="mb-3">
    <label for="action">Escolha uma Ação:</label>
        <select class="form-select" aria-label="Default select example" name="action_id">
          <option value="{{$action->id}}">{{$action->title}}</option>
          @foreach($actions as $at)
            <option value="{{$at->id}}">{{$at->title}}</option>
          @endforeach
        </select>
    </div>
    
     <div class="mb-3">
        <label for="disableTextInput" class="form-label">Quantidade</label>
        <input type="number" id="disableTextInput" name="quantity" class="form-control" value="{{$useractions->quantity}}">
    </div>
    <div class="mb-3">
        <label for="disableTextInput" class="form-label">Data</label>
        <input type="date" id="disableTextInput" name="date" class="form-control" value="{{$useractions->date}}">
    </div>
   
        
    
    <button type="submit" class="btn btn-primary">Salvar</button>
   
    </form>
    @endsection