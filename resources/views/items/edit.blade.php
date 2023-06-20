@extends('layouts.app')
@section('title', 'Sparepart - items')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit item</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('items.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
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
  
    <form action="{{ route('items.update',$item->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kode Barang:</strong>
                    <input type="text" name="item_code" value="{{ $item->item_code }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Barang:</strong>
                    <input type="text" name="item_name" value="{{ $item->item_name }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Harga Jual:</strong>
                    <input type="number" name="selling_price" value="{{ $item->selling_price }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Harga Beli:</strong>
                    <input type="number" name="purchase_price" value="{{ $item->purchase_price }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Satuan:</strong>
                    <select class="form-control" name="unit">
                        <option value="Set" {{ $item->unit == 'Set' ? 'selected' : '' }}>Set</option>
                        <option value="Pax" {{ $item->unit == 'Pax' ? 'selected' : '' }}>Pax</option>
                        <option value="Buah" {{ $item->unit == 'Buah' ? 'selected' : '' }}>Buah</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Kategori:</strong>
                    <select class="form-control" name="category">
                        <option value="Body" {{ $item->category_id == 'Body' ? 'selected' : '' }}>Body</option>
                        <option value="Mesin" {{ $item->category_id == 'Mesin' ? 'selected' : '' }}>Mesin</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
</div>
@endsection