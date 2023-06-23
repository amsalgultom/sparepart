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
            <div class="col-xs-12 col-sm-12 col-md-6">
                <ul class="contact-info" style="position: static !important;">
                    <li>
                        <h3>contact info</h3>
                    </li>
                    <li>
                        <i class="fa fa-map-marker"></i>
                        <div class="text">
                            <p>JATISARI PERMAI JALAN RINJANI III BLOK DD.1 NOMOR <br>
                                24, JATIASIH, BEKASI, Kel. Jatisari, Kec. Jatiasih, Kota Bekasi, <br>
                                Prov. Jawa Barat</p>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-phone"></i>
                        <div class="text">
                            <p>+62 822 1093 3929</p>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-paper-plane-o"></i>
                        <div class="text">
                            <p>pelitanusawiratama@mail.com</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.452831727867!2d106.94914047580637!3d-6.335339561989004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6992fd921756e7%3A0x41c322cf6463e407!2sJl.%20Rinjani%20III%2C%20RT.001%2FRW.010%2C%20Jatisari%2C%20Kec.%20Jatiasih%2C%20Kota%20Bks%2C%20Jawa%20Barat%2017426!5e0!3m2!1sen!2sid!4v1687491482263!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>
<!-- about us section end -->
@endsection