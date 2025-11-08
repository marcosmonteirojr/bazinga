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
<form action="{{route('useraction.store')}}" method="POST">
@csrf
    <legend>Adicionar Ação do usuário</legend>
    <div class="mb-3">
        <label for="user">Escolha um usuário:</label>
        <select class="form-select" aria-label="Default select example" name="user">
          <option value="">--Selecione--</option>
          @foreach($user as $us)
            <option value="{{$us->id}}">{{$us->name}}</option>
          @endforeach
        </select>
    </div>
    <div class="mb-3">
    <label for="action">Escolha uma Ação:</label>
        <select class="form-select" aria-label="Default select example" name="action">
          <option value="">--Selecione--</option>
          @foreach($actions as $at)
            <option value="{{$at->id}}">{{$at->title}}</option>
          @endforeach
        </select>
    </div>
    
     <div class="mb-3">
        <label for="disableTextInput" class="form-label">Quantidade</label>
        <input type="number" id="disableTextInput" name="quantity" class="form-control" value="">
    </div>
    <div class="mb-3">
        <label for="disableTextInput" class="form-label">Data</label>
        <input type="date" id="disableTextInput" name="date" class="form-control" value="">
    </div>
   
        
    
    <button type="submit" class="btn btn-primary">Salvar</button>
   
    </form>
    @endsection