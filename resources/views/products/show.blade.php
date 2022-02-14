@extends('layouts.base')

@section('pageContent')
<h1>{{$product->name}}</h1>
<img src="{{$product->image}}" alt="{{$product->name}}">
<h3>{{$product->type}}</h3>
<p>
    {!!$product->description!!}
</p>
<div>
    <a href="{{route("products.index")}}"><button type="button" class="btn btn-primary">Torna ai prodotti</button></a>
</div>
@endsection