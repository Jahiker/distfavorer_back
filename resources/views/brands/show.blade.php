@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="justify-content-center">

        @include('includes.alert')

        <div class="row">

            @foreach ($products as $product)

            <div class="p-2 col-12">

                <div class="card card-outline card-danger">
                    <div class="card-header">
                    <h3 class="card-title"><a href="{{ route('products.show', ['product' => $product]) }}"><strong class="text-dark">{{$product->name}}</strong></a></h3>

                    <div class="card-tools">

                        <form action="{{route('products.destroy', ['product' => $product])}}" method="POST" onsubmit="return confirm('Desea Eliminar el producto {{$product->name}}?\nuna vez confirmada la acción no se podrá revertir')">
                            @method('delete')
                            @csrf

                            <a type="button" href="{{route('products.edit', ['product' => $product])}}" class="btn btn-tool text-primary"><i class="fas fa-edit"></i></a>

                            <button type="submit" class="btn btn-tool text-danger" ><i class="fas fa-trash-alt"></i></button>

                        </form>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body row">
                    <div class="col-2">
                        <img src="{{$product->image}}" class="img-thumbnail" height="100px" alt="">
                    </div>
                    <div class="card-text col-10">
                        <p class="info-box-text ml-2"><strong>Producto: </strong>{{$product->description}}</p>
                        <p class="info-box-text ml-2"><strong>Categoria: </strong>{{$product->category->name}}</p>
                        <p class="info-box-text ml-2"><strong>Marca: </strong>{{$product->brand->name}}</p>
                    </div>
                </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>

            @endforeach

            <div class="mx-auto text-center">
                {{$products->links()}}
            </div>

        <div/>
    </div>
</div>

@endsection
