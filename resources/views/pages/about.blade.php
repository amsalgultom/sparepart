@extends('layout-customers.app')
@section('title', 'Sparepart - Home')

@section('content')
<!-- page banner area start -->
<div class="page-banner">
    <img src="{{ asset('assets/img/bg3.png') }}" alt="Page Banner" />
</div>
<!-- page banner area end -->
<!-- about us section start -->
<section class="about-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="about-img text-center">
                    <img src="{{ asset('assets/img/about/pnw.jpg') }}" alt="" />
                </div><br><br>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="about-text">
                    <h3>Tentang Kami</h3>
                    <p>PT. Pelita Nusantara Wiratama adalah perusahaan yang bergerak pada bidang penjualan sparepart
                        motor yang berdiri pada tahun 2018. Barang yang dijual oleh PT. Pelita Nusantara Wiratama
                        adalah berbagai jenis peralatan dan perlengkapan untuk sepeda motor. </p> <br />
                    <h3>Visi dan Misi perusahaan:</h3>
                    <h3>Visi</h3>
                    <p>Menjadi perusahaan yang handal, terpercaya dan sebagai solusi terbaik dalam menyediakan
                        sparepart motor, dengan komitmen terhadap kualitas, keandalan, dan kepuasan pelanggan.</p>
                    <p>&nbsp;</p>
                    <h3>Misi</h3>
                    <p>1. Menyediakan suku cadang motor yang orisinil, berkualitas, dan terjamin keandalannya.</p>
                    <p>2. Memberikan pelayanan yang cepat, akurat, dan ramah pelanggan dalam setiap interaksi jual
                        beli.</p>
                    <p>3. Memastikan ketersedian stok yang memadai dan efisien untuk memenuhi permintaan pelanggan
                        dengan tepat waktu.</p>
                    <p>4. Berkomitmen untuk memenuhi standar kualitas dan keandalan yang tinggi dalam setiap produk
                        yang disediakan.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about us section end -->
@endsection