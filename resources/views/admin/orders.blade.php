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
                                @elseif($order->status_id == 2)
                                <a href="{{ route('admin.documenorder',$order->id )}}" class="btn btn-info btn-icon-split mt-2">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-info-circle"></i>
                                    </span>
                                    <span class="text">Dokumen Order</span>
                                </a><br>
                                <button type="button" class="btn btn-warning btn-icon-split mt-2" data-toggle="modal" data-target="#modalresi{{ $order->id }}">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-flag"></i>
                                    </span>
                                    <span class="text">Input Resi</span>
                                </button><br>
                                <a href="{{ route('admin.confirmordersuccess',$order->id )}}" class="btn btn-success btn-icon-split mt-2">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Selesaikan Order</span>
                                </a>
                                @else
                                @endif
                            </td>
                        </tr>


                        <!-- Modal -->
                        <div class="modal fade" id="modalresi{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="modalresi{{ $order->id }}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalresi{{ $order->id }}Label">Masukan No Resi Pengiriman</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('admin.resi') }}" method="post">
                                    @csrf
                                        <div class="modal-body">
                                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                                            <input type="text" name="no_resi" class="form-control" value="{{ $order->no_resi }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.container-fluid -->
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


<!-- End of Main Content -->
@endsection