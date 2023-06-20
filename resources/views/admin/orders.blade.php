@extends('layouts.app')
@section('title', 'Sparepart - Order')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Table Order</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Tanggal</th>
                            <th>Pengiriman</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Order ID</th>
                            <th>Tanggal</th>
                            <th>Pengiriman</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        @foreach($myorders as $order)
                        <tr>
                            <td>#{{$order->id}}</td>
                            <td>{{ \Carbon\Carbon::parse($order->date)->format('d M Y') }}</td>
                            <td>{{$order->shipping_method}} - {{ 'Rp '.number_format($order->shipping_cost, 0, ',', '.') }}</td>
                            <td>{{ 'Rp '.number_format($order->total, 0, ',', '.') }}</td>
                            <td>{{$order->status?->name}}</td>
                            <td>
                                <a href="{{ route('admin.detailorder',$order->id )}}" class="btn btn-secondary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-arrow-right"></i>
                                    </span>
                                    <span class="text">Lihat Detail</span>
                                </a><br>
                                @if($order->status_id == 1)
                                <a href="{{ route('admin.confirmorder',$order->id )}}" class="btn btn-success btn-icon-split mt-2">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Lakukan Konfirmasi</span>
                                </a>
                                @else
                                <a href="{{ route('admin.documenorder',$order->id )}}" class="btn btn-info btn-icon-split mt-2">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-info-circle"></i>
                                    </span>
                                    <span class="text">Dokumen Order</span>
                                </a>
                                @endif
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