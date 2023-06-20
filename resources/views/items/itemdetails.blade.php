@extends('layout-customers.app')
@section('title', 'Sparepart - Home')

@section('content')
<!-- page banner area start -->
<div class="page-banner">
	<img src="{{ asset('assets/img/bg3.png') }}" alt="Page Banner" />
</div>
<!-- page banner area end -->
<!-- product details area start -->
<section class="product-details section-padding-top">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="left">
					<!-- Single-pro-slider Big-photo start -->
					<div class="large-slider zoom-gallery">
						<div>
							<img src="{{ asset('uploads-images/items/').'/'.$item->image }}" alt="" />
							<a href="{{ asset('uploads-images/items/').'/'.$item->image }}" title="Product Title"><img src="{{ asset('assets/img/icon/zoom.png')}}" alt="" /></a>
						</div>
					</div>
					<!-- Single-pro-slider Big-photo end -->

					<!-- Single-pro-slider Small-photo end -->
				</div>
			</div>
			<div class="col-sm-6">
				<div class="right">
					<div class="singl-pro-title">
						<h3>{{ $item->name }} </h3>
						<h1>{{ 'Rp '.number_format($item->price, 0, ',', '.') }}</h1>
						<p>{{ $item->brand }}</p>
						<hr />
						<p>{{ $item->description }}</p>
						<hr />


						<form action="{{ route('items.store') }}" method="POST">
							@csrf
							<div class="color-brand clearfix">
								<div class="s-select s-plus-minus">
										<div class="plus-minus">
											<a class="dec qtybutton">-</a>
											<input type="text" value="1" name="qty" class="plus-minus-box">
											<a class="inc qtybutton">+</a>
										</div>
								</div>
							</div>
							<div class="actions-btn">
								<ul class="clearfix text-center">
									<li>
										<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
										<input type="hidden" name="item_id" value="{{ $item->id }}">
										<input type="hidden" name="status" value="0">
										<button type="submit"><i class="fa fa-shopping-cart"></i> add to cart</button>
									</li>
									<li>
										<a href="#"><i class="fa fa-share-alt"></i></a>
									</li>
								</ul>
							</div>

						</form>
						<hr />
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection