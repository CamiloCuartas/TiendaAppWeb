@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/brand.css')}} ">
@endpush

@section('content')
    <div class="container-fluid">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a
                    class="nav-link {{$action === 'get' ? 'active' : ''}}"
                    aria-current="page"
                    href="{{route('brands', ['action' => 'get'])}}">Consultar
                </a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link {{$action === 'post' ? 'active' : ''}}"
                    href="{{route('brands', ['action' => 'post'])}}">Crear
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
        <div id="divSelectBrand">
            @if($action === 'get')
                <select id="selectBrand" class="form-select" aria-label="Default select example">
                    <option selected>Lista de proveedores</option>
                    @foreach($data as $item)
                        <option value="{{$item['id']}}">{{$item['providerName']}}</option>
                    @endforeach
                </select>
            @elseif($action === 'post')
                <form action="{{ url('/brands') }}" method="post">
                    @csrf
                    <div id="divFormelements">
                        <div id="divInputNewBrand" class="mb-3">
                            <input
                                type="text"
                                name="newBrand"
                                class="form-control"
                                id="inputNewBrand"
                                placeholder="Nueva Marca"
                                aria-label=""
                            >
                        </div>
                        <div id="divButtonSaveBrand">
                            <button id="buttonSaveBrand" type="submit" class="btn btn-primary">Crear</button>
                        </div>
                        @if($error)
                            <div class="alert alert-danger" role="alert">
                                !! Ha ocurrido un error !!
                            </div>
                        @endif
                        @if($succes)
                            <div class="alert alert-success" role="alert">
                                !! Creado con exito !!
                            </div>
                        @endif
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection
