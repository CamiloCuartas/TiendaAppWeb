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
                    class="nav-link {{$action === 'store' ? 'active' : ''}}"
                    href="{{route('brands', ['action' => 'store'])}}">Crear
                </a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link {{$action === 'edit' ? 'active' : ''}}"
                    href="{{route('brands', ['action' => 'edit'])}}">Editar
                </a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link {{$action === 'destroy' ? 'active' : ''}}"
                    href="{{route('brands', ['action' => 'destroy'])}}">Eliminar
                </a>
            </li>
        </ul>
        <div id="divSelectBrand">
            @if($action === 'get')
                <select id="selectBrand" class="form-select" aria-label="">
                    <option selected>Lista de proveedores</option>
                    @foreach($data as $item)
                        <option value="{{$item['id']}}">{{$item['providerName']}}</option>
                    @endforeach
                </select>
            @elseif($action === 'store')
                <form action="{{ url('/brands/store') }}" method="post">
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
            @elseif($action === 'edit')
                <form action="{{ url('/brands/edit') }}" method="post">
                    @csrf
                    <div id="divFormelements">
                        <div id="divSelectUpdateBrand">
                            <select id="selectBrand" class="form-select" aria-label="" name="selectBrand">
                                <option value="-1" selected>Lista de proveedores</option>
                                @foreach($data as $item)
                                    <option value="{{$item['id']}}">{{$item['providerName']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="divInputUpdateBrand">
                            <input
                                type="text"
                                name="editBrand"
                                class="form-control"
                                id="inputEditBrand"
                                placeholder="Edicion de marca"
                                aria-label=""
                            >
                        </div>
                        <div id="divButtonUpdateBrand">
                            <button id="buttonUpdateBrand" type="submit" class="btn btn-primary">Editar</button>
                        </div>
                        @if($error)
                            <div class="alert alert-danger" role="alert">
                                !! Ha ocurrido un error !!
                            </div>
                        @endif
                        @if($succes)
                            <div class="alert alert-success" role="alert">
                                !! Actualizado con exito !!
                            </div>
                        @endif
                    </div>
                </form>
                @push('page_scripts')
                    <script src="{{asset('js/brand/brand.js')}}" async type="module"></script>
                @endpush
            @elseif($action === 'destroy')
                <form action="{{ url('/brands/destroy') }}" method="post">
                    @csrf
                    <div id="divFormelements">
                        <div id="divSelectDeleteBrand">
                            <select id="selectBrand" class="form-select" aria-label="" name="selectBrand">
                                <option value="-1" selected>Lista de proveedores</option>
                                @foreach($data as $item)
                                    <option value="{{$item['id']}}">{{$item['providerName']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="divButtonDeleteBrand">
                            <button id="buttonDeleteBrand" type="submit" class="btn btn-primary">Eliminar</button>
                        </div>
                        @if($error)
                            <div class="alert alert-danger" role="alert">
                                !! Ha ocurrido un error !!
                            </div>
                        @endif
                        @if($succes)
                            <div class="alert alert-success" role="alert">
                                !! Eliminado con exito !!
                            </div>
                        @endif
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection
