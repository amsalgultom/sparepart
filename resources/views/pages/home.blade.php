@extends('layout-customers.app')
@section('title', 'Sparepart - Home')

@section('content')
<!-- slider section start -->
<div class="slider-area slider-one clearfix">
		<div class="slider" id="mainslider">
			<div data-src="{{ asset('assets/img/slider/bg.jpg') }}">
				<div class="d-table">
					<div class="d-tablecell">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<div class="slide-text">
										<h1 class="animated fadeInDown">Penjualan Sparepart Online</h1>
										<div class="shape animated flipInX">
											<img src="{{ asset('assets/img/slider/shape.png') }}" alt="" />
										</div>
										<h4 class="animated fadeIn">Selamat datan di web penjualan spartpart online</h4>
										<a class="shop-btn animated fadeInUp" href="{{route('items.all')}}">Belanja Sekarang</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div data-src="{{ asset('assets/img/slider/bg2.jp') }}g">
				<div class="d-table">
					<div class="d-tablecell">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<div class="slide-text">
										<h1 class="animated fadeInDown">Produk dengan kualitas terbaik</h1>
										<div class="shape animated flipInX">
											<img src="{{ asset('assets/img/slider/shape.png') }}" alt="" />
										</div>
										<h4 class="animated fadeIn">Supplier pertama dari Pabrik terpercaya.</h4>
										<a class="shop-btn animated fadeInUp" href="{{route('items.all')}}">Belanja Sekarang</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- slider section end -->
	<!-- featured section start -->
	<section class="featured-area featured-one section-padding">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-md-6 col-text-center">
					<div class="section-title text-center">
						<h3><span>Item Baru</span> Ditambahkan</h3>
						<div class="shape">
							<img src="{{ asset('assets/img/icon/t-shape.png') }}" alt="Title Shape" />
						</div>
					</div>
				</div>
			</div>
			<div class="row text-center">
				<div class="featured-slider single-products">
                    @foreach ($items as $item)
					<div class="single-slide">
						<div class="padding30">
							<div class="product-item">
								<div class="pro-img" style="margin-bottom: 10px;">
									<a href="itemdetails/{{ $item->id }}"><img
											src="{{ asset('uploads-images/items/').'/'.$item->image }}"
											height="150" alt="" /></a>
								</div>
								<div class="product-title">
									<a href="itemdetails/{{ $item->id }}">
										<h5>{{ $item->name }}</h5>
									</a>
									<p>Harga <span>{{ 'Rp '.number_format($item->price, 0, ',', '.') }}</span></p>
								</div>
							</div>
						</div>
					</div>
                    @endforeach
				</div>
			</div>
		</div>
	</section>
	<!-- featured section end -->
	<!-- quick view start -->
	<div class="product-details quick-view modal animated zoomIn" id="quick-view">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="d-table">
						<div class="d-tablecell">
							<div class="modal-dialog">
								<div class="main-view modal-content">
									<div class="modal-footer" data-dismiss="modal">
										<span>x</span>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="left">
												<!-- Single-pro-slider Big-photo start -->
												<div class="quick-img">
													<img src="{{ asset('assets/img/products/l1.jpg') }}" alt="" />
												</div>
												<!-- Single-pro-slider Big-photo end -->
											</div>
										</div>
										<div class="col-sm-6">
											<div class="right">
												<div class="singl-pro-title">
													<h3>GT Sensor Carbon Jenson </h3>
													<h1>$1700.00</h1>
													<hr />
													<p>doming id quod mazim placerat facer possim assum. Typi non habent
														claritatem insitam; est usus legentis in iis qui facit eorum
														claritatem. Investigationes demonstraverunt lectores legere me
														lius quod ii legunt saepius.</p>
													<hr />
													<div class="color-brand clearfix">
														<div class="s-select">
															<div class="custom-select">
																<select class="form-control">
																	<option>Color</option>
																	<option>Red </option>
																	<option>Green </option>
																	<option>Blue</option>
																</select>
															</div>
														</div>
														<div class="s-select">
															<div class="custom-select">
																<select class="form-control">
																	<option>Brend</option>
																	<option>Men </option>
																	<option>Fashion </option>
																	<option>Shirt</option>
																</select>
															</div>
														</div>
														<div class="s-select s-plus-minus">
															<form action="#" method="POST">
																<div class="plus-minus">
																	<a class="dec qtybutton">-</a>
																	<input type="text" value="02" name="qtybutton"
																		class="plus-minus-box">
																	<a class="inc qtybutton">+</a>
																</div>
															</form>
														</div>
													</div>
													<div class="actions-btn">
														<ul class="clearfix text-center">
															<li>
																<a href="cart.html"><i class="fa fa-shopping-cart"></i>
																	add to cart</a>
															</li>
															<li>
																<a href="cart.html"><i class="fa fa-heart-o"></i></a>
															</li>
															<li>
																<a href="#"><i class="fa fa-compress"></i></a>
															</li>
															<li>
																<a href="#"><i class="fa fa-share-alt"></i></a>
															</li>
														</ul>
													</div>
													<hr />
													<div class="categ-tag">
														<ul class="clearfix">
															<li>
																CATEGORIES:
																<a href="#">Bike,</a> <a href="#">Cycle,</a> <a
																	href="#">Ride,</a> <a href="#">Mountain</a>
															</li>
															<li>
																TAG:
																<a href="#">Ride,</a> <a href="#">Helmet,</a> <a
																	href="#">cycle,</a> <a href="#">bike</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection