@extends('layouts.base')

@section('pageContent')
    <h1>Crea un nuovo prodotto</h1>

    <form action="{{route("products.store")}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Inserisci il nome del prodotto" value="{{old("name")}}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="type">Tipo Pasta</label>
            <select class="form-control form-control-md @error('type') is-invalid @enderror" id="type" name="type">
                <option value="lunga" {{old("type") == "lunga" ? "selected" : null}}>Lunga</option>
                <option value="corta" {{old("type") == "corta" ? "selected" : null}}>Corta</option>
                <option value="cortissima" {{old("type") == "cortissima" ? "selected" : null}}>Cortissima</option>
            </select>
            @error('type')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="cooking_time">Tempo di cottura</label>
            <input type="number" class="form-control @error('cooking_time') is-invalid @enderror" id="cooking_time" name="cooking_time" placeholder="Inserisci il tempo di cottura" value="{{old("cooking_time")}}">
            @error('cooking_time')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="weight">Peso</label>
            <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" placeholder="Inserisci il peso del prodotto" value="{{old("weight")}}">
            @error('weight')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="8" placeholder="Inserisci la descrizione del prodotto">{{old("description")}}</textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Immagine</label>
            <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" placeholder="Inserisci l'url dell'immagine" value="{{old("image")}}">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Crea</button>
    </form>

@endsection