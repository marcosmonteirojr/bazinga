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
<form action="{{route('action.store')}}" method="POST">
@csrf
    <legend>Adicionar Ação</legend>
    <div class="mb-3">
        <label for="disableTextInput" class="form-label">Titulo</label>
        <input type="text" id="disableTextInput" name="title" class="form-control" value="{{old('title')}}">
    </div>
     <div class="mb-3">
        <label for="disableTextInput" class="form-label">Descrição</label>
        <input type="text" id="disableTextInput" name="description" class="form-control" value="{{old('description')}}">
    </div>
     <label for="categoria">Escolha uma Categoria:</label>
        <select class="form-select" aria-label="Default select example" name="category_id">
          <option value="">--Selecione--</option>
          @foreach($categories as $cat)
            <option value="{{$cat->id}}">{{$cat->name}}</option>
          @endforeach
        </select>
     <div class="mb-3">
        <label for="disableTextInput" class="form-label">Pontos</label>
        <input type="text" id="disableTextInput" name="points" class="form-control" value="{{old('points')}}">
    </div>
   
        
    
    <button type="submit" class="btn btn-primary">Salvar</button>
   
    </form>
    @endsection