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
<form action="{{route('action.update',$action->id)}}" method="POST">
@csrf
@method('PUT')
    <legend>Editar Ação</legend>
    <div class="mb-3">
        <label for="disableTextInput" class="form-label">Titulo</label>
        <input type="text" id="disableTextInput" name="title" class="form-control" value="{{$action->title}}">
    </div>
     <div class="mb-3">
        <label for="disableTextInput" class="form-label">Descrição</label>
        <input type="text" id="disableTextInput" name="description" class="form-control" value="{{$action->description}}">
    </div>

     <label for="categoria">Escolha uma Categoria:</label>
        <select class="form-select" aria-label="Default select example" name="category_id">
          <option value="{{$category_id->id}}">{{$category_id->name}}</option>
          @foreach($categories as $cat)
            <option value="{{$cat->id}}">{{$cat->name}}</option>
          @endforeach
        </select>
     <div class="mb-3">
        <label for="disableTextInput" class="form-label">Pontos</label>
        <input type="text" id="disableTextInput" name="points" class="form-control" value="{{$action->points}}">
    </div>
   
        
    
    <button type="submit" class="btn btn-primary">Salvar</button>
   
    </form>
    @endsection