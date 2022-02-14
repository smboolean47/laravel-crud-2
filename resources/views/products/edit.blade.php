@extends('layouts.base')

@section('pageContent')
<h1>Modifica prodotto: {{$product->name}}</h1>

<form action="{{route("products.update", $product->id)}}" method="POST">
    @csrf
    @method("PUT")

    <div class="form-group">
      <label for="name">Nome</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Inserisci il nome del prodotto" value="{{old("name") ? old("name") : $product->name}}">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="type">Tipo Pasta</label>
        <select class="form-control form-control-md @error('type') is-invalid @enderror" id="type" name="type">
            @php
                $selected = old("type") ? old("type") : $product->type;
            @endphp
                <option value="lunga" {{$selected == "lunga" ? "selected" : ""}}>Lunga</option>
                <option value="corta" {{$selected == "corta" ? "selected" : ""}}>Corta</option>
                <option value="cortissima" {{$selected == "cortissima" ? "selected" : ""}}>Cortissima</option>
        </select>
        @error('type')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="cooking_time">Tempo di cottura</label>
        <input type="number" class="form-control @error('cooking_time') is-invalid @enderror" id="cooking_time" name="cooking_time" placeholder="Inserisci il tempo di cottura" value="{{old("cooking_time") ? old("cooking_time")  : $product->cooking_time}}">
        @error('cooking_time')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="weight">Peso</label>
        <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" placeholder="Inserisci il peso del prodotto" value="{{old("weight") ? old("weight") : $product->weight}}">
        @error('weight')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Descrizione</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="8" placeholder="Inserisci la descrizione del prodotto">{{old("description") ? old("description") : $product->description}}</textarea>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="image">Immagine</label>
        <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" placeholder="Inserisci l'url dell'immagine" value="{{old("image") ? old("image") : $product->image}}">
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Modifica</button>
  </form>
@endsection