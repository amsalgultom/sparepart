@extends('layouts.app')
@section('title', 'Sparepart - items')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Table items</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="/items/create">Klik disini</a> untuk membuat item Baru</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Merek</th>
                            <th>Stok</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Merek</th>
                            <th>Stok</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->brand }}</td>
                            <td>{{ $item->stock }}</td>
                            <td>{{ 'Rp '.number_format($item->price, 0, ',', '.') }}</td>
                            <td class="text-center"><img src="{{ asset('uploads-images/items/').'/'.$item->image }}" alt="{{ $item->name }}" width="100"></td>
                            <td>
                                <form action="{{ route('items.destroy',$item->id) }}" method="POST">

                                    <a class="btn btn-info btn-circle btn-lg" href="{{ route('items.show',$item->id) }}"><i class="fas fa-info-circle"></i></a>

                                    <a class="btn btn-warning btn-circle btn-lg" href="{{ route('items.edit',$item->id) }}"><i class="fas fa-exclamation-triangle"></i></a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-circle btn-lg"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->
@endsection