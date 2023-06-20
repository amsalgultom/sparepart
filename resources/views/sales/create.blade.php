@extends('layouts.app')
@section('title', 'Sparepart - Penjualan')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Buat Baru Barang</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('sales.index') }}"> <i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>
    <br>
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Error!</strong> <br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('sales.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>No Faktur:</strong>
                    <input type="text" name="invoice_no" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Nama Konsumen:</strong>
                    <input type="text" name="consumer_name" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 d-none">
                <div class="form-group">
                    <strong>Tanggal Faktur</strong>
                    <input type="hidden" name="invoice_date" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-3">
                <div class="form-group">
                    <strong>Nama Item</strong><br>
                    <select class="w-100 select-so" id="select_item_id" name="item_code" class="form-control w-100" required>
                        <option value="" data-harga="0">Pilih item</option>
                        @foreach ($items as $item)
                        <option value="{{$item->item_code}}" data-harga="{{$item->selling_price}}">{{$item->item_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3">
                <div class="form-group">
                    <strong>Sub Total</strong>
                    <input type="number" id="sub_total_item1" name="unit_price" class="form-control" placeholder="" readonly>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3">
                <div class="form-group">
                    <strong>qty</strong>
                    <input type="number" id="qty_item1" name="qty" class="form-control" placeholder="qty" min="1" value="1" required>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3">
                <div class="form-group">
                    <strong>Total</strong>
                    <input type="number" id="total_item1" name="total_price" class="form-control" readonly>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

    </form>

</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->
@endsection

@push('scripts')

<script>
    $("#select_item_id").change(function() {
        $("#sub_total_item1").val($(this).find(':selected').data('harga'));
        var total = $("#sub_total_item1").val() * $("#qty_item1").val();
        $("#total_item1").val(total);
    });
    $("#qty_item1").change(function() {
        var total = $("#sub_total_item1").val() * $("#qty_item1").val();
        $("#total_item1").val(total);
    });

    
</script>

@endpush