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
                    href="{{route('brands', ['action' => 'get'])}}">Consultar Marca
                </a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link {{$action === 'store' ? 'active' : ''}}"
                    href="{{route('brands', ['action' => 'store'])}}">Crear Marca
                </a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link {{$action === 'edit' ? 'active' : ''}}"
                    href="{{route('brands', ['action' => 'edit'])}}">Editar Marca
                </a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link {{$action === 'destroy' ? 'active' : ''}}"
                    href="{{route('brands', ['action' => 'destroy'])}}">Eliminar Marca
                </a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link {{$action === 'storeItem' ? 'active' : ''}}"
                    href="{{route('items', ['action' => 'storeItem'])}}">Crear Item
                </a>
            </li>
        </ul>
        <div id="divSelectBrand">
            @if($action === 'get')
                <div id="divSelectToShowData">
                    <select id="selectBrandToShowData" class="form-select" aria-label="">
                        <option value="-1" selected>Lista de proveedores</option>
                        @foreach($data as $item)
                            <option value="{{$item['id']}}">{{$item['providerName']}}</option>
                        @endforeach
                    </select>
                </div>
                <div id="divTable">
                    <table>
                        <thead>
                            <tr>
                                <th class="id">id</th>
                                <th class="name">name</th>
                                <th class="size">size</th>
                                <th class="observations">observations</th>
                                <th class="onHand">onHand</th>
                                <th class="shippingDate">shippingDate</th>
                                <th class="edition"></th>
                                <th class="delete"></th>
                                <th class="providerId d-none"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td class="id">{{$item['id']}}</td>
                                    <td class="name">
                                        <input type="text" aria-label="" value="{{$item['name']}}">
                                    </td>
                                    <td class="size">
                                        <select name="" id="" aria-label="">
                                            <option value="S" {{$item['size'] === 'S' ? 'selected' : ''}}>S</option>
                                            <option value="M" {{$item['size'] === 'M' ? 'selected' : ''}}>M</option>
                                            <option value="L" {{$item['size'] === 'L' ? 'selected' : ''}}>L</option>
                                        </select>
                                    </td>
                                    <td class="observations">
                                        <input type="text" aria-label="" value="{{$item['observations']}}">
                                    </td>
                                    <td class="onHand">
                                        <input type="number" aria-label="" value="{{$item['onHand']}}">
                                    </td>
                                    <td class="shippingDate">
                                        <input type="date" aria-label="" value="{{$item['shippingDate']}}">
                                    </td>
                                    <td class="edition">
                                        <i class="fas fa-pencil-alt fa-lg"></i>
                                    </td>
                                    <td class="delete">
                                        <i class="fas fa-trash fa-lg"></i>
                                    </td>
                                    <td class="providerId d-none">{{$item['providerId']}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @push('page_scripts')
                    <script src="{{asset('js/brand/brand.js')}}" async type="module"></script>
                @endpush
            @elseif($action === 'store')
                <div id="divStore">
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
                </div>
            @elseif($action === 'edit')
                <div id="divEdit">
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
                </div>
                @push('page_scripts')
                    <script src="{{asset('js/brand/brand.js')}}" async type="module"></script>
                @endpush
            @elseif($action === 'destroy')
                <div id="divDestroy">
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
                </div>
            @elseif($action === 'storeItem')
                <div id="divDestroy">
                    <form action="{{ url('/items/store') }}" method="post">
                        @csrf
                        <div id="divFormelements">
                            <div id="divInputItemName" class="mb-3">
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    id="inputItemName"
                                    placeholder="Nuevo Item"
                                    aria-label=""
                                >
                            </div>
                            <select name="size" id="selectItemSize" aria-label="" class="form-select" >
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                            </select>
                            <div id="divInputItemObservation" class="mb-3">
                                <input
                                    type="text"
                                    name="observations"
                                    class="form-control"
                                    id="inputItemObaservation"
                                    placeholder="Obaservacion"
                                    aria-label=""
                                >
                            </div>
                            <select id="selectItemBrand" class="form-select" aria-label="" name="providerId">
                                <option value="-1" selected>Lista de proveedores</option>
                                @foreach($data as $datas)
                                    <option value="{{$datas['id']}}">{{$datas['providerName']}}</option>
                                @endforeach
                            </select>
                            <div id="divInputItemOnHand" class="mb-3">
                                <input
                                    type="number"
                                    name="onHand"
                                    class="form-control"
                                    id="inputItemOnHand"
                                    placeholder="Stock"
                                    aria-label=""
                                >
                            </div>
                            <div id="divInputItemShippingDate" class="mb-3">
                                <input
                                    type="date"
                                    name="shippingDate"
                                    class="form-control"
                                    id="inputItemShippingDate"
                                    placeholder="Fecha Envio"
                                    aria-label=""
                                >
                            </div>
                            <button id="buttonCreateItem" type="submit" class="btn btn-primary">Crear</button>
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
                </div>
            @endif
        </div>
    </div>
@endsection
