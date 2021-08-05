@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/brand.css')}} ">
@endpush

@section('content')
    <div class="container-fluid">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a
                    class="nav-link active"
                    aria-current="page"
                    href="{{route('brands')}}">Consultar
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
        <div id="divSelectBrand">
            @if(request()->path() === 'brands')
                <select id="selectBrand" class="form-select" aria-label="Default select example">
                    <option selected>Lista de proveedores</option>
                    @foreach($data as $item)
                        <option value="{{$item['id']}}">{{$item['providerName']}}</option>
                    @endforeach
                </select>
            @endif
        </div>
    </div>
@endsection
