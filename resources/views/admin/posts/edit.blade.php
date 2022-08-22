@extends('layouts.app')

@section('page_title', 'Modifico Fumetti')

@section('content')
    <div class="d-flex justify-content-center m-5">
        <h1 class=" text-white border border-success rounded-pill border-3 border-opacity-50 p-3">MODIFICA FUMETTO</h1>
    </div>
    <div class="container">
        <form action="{{route('comics.update', $comic->id)}}" method="post">
            @csrf
            @method("PATCH")
            <div class="mb-3">
                <label for="exampleInputTitle" class="form-label">Titolo</label>
                <input type="text" name="title" class="form-control{{ $errors->has('title') ? 'is-invalid' : " " }}"  id="exampleInputTitle" value="{{ old("title") ?? $comic->title }}">
                <div class="invalid-feedback">
                    {{ $errors->first('title') }}
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputDescription" class="form-label">Descrizione</label>
                <textarea type="text" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : " " }}" id="exampleInputDescription">{!!  old("description") ?? $comic->description!!}</textarea>
                <div class="invalid-feedback">
                    {{ $errors->first('description') }}
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputSeries" class="form-label">Serie</label>
                <input type="text" name="series" class="form-control {{ $errors->has('series') ? 'is-invalid' : " " }}"  id="exampleInputSeries" value="{{old("series") ?? $comic->series}}">
                <div class="invalid-feedback">
                    {{ $errors->first('series') }}
                </div>
            </div>
            <div>
                <label for="exampleInputPrice">Prezzo</label>
                <input type="number" name="price" min="0.00" max="10000.00" step="0.01" class="form-control {{ $errors->has('price') ? 'is-invalid' : " " }}"  id="exampleInputPrice" value="{{ old("price") ?? $comic->price}}"/>
                <div class="invalid-feedback">
                    {{ $errors->first('price') }}
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputType" class="form-label">Tipologia</label>
                <input type="text" name="type" class="form-control"  id="exampleInputType" value="{{old("type") ?? $comic->type}}">
                <div class="invalid-feedback">
                    {{ $errors->first('type') }}
                </div>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{route('comics.index')}}" class="btn btn-secondary">Discard</a>
        </form>
    </div>

@endsection