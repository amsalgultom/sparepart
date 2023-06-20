@extends('layouts.app')
@section('title', 'Sparepart - Penjualan')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Table Penjualan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="/sales/create">Klik disini</a> untuk membuat Penjualan Baru</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tgl Faktur</th>
                            <th>Tgl Faktur</th>
                            <th>Nama Konsumen</th>
                            <th>Kode barang</th>
                            <th>Jumlah</th>
                            <th>Harga satuan</th>
                            <th>Harga total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Tgl Faktur</th>
                            <th>Tgl Faktur</th>
                            <th>Nama Konsumen</th>
                            <th>Kode barang</th>
                            <th>Jumlah</th>
                            <th>Harga satuan</th>
                            <th>Harga total</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($sales as $sale)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $sale->invoice_date }}</td>
                            <td>{{ $sale->invoice_no }}</td>
                            <td>{{ $sale->consumer_name }}</td>
                            <td>{{ $sale->item_code }}</td>
                            <td>{{ $sale->qty }}</td>
                            <td>{{ 'Rp '.number_format($sale->unit_price, 0, ',', '.') }}</td>
                            <td>{{ 'Rp '.number_format($sale->total_price, 0, ',', '.') }}</td>
                            <td>
                                <a href="/generate-pdf/{{$sale->id}}" class="btn btn-secondary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fa fa-truck"></i>
                                    </span>
                                    <span class="text">Download Invoice</span>
                                </a>
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