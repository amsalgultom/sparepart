@extends('layout-customers.app')
@section('title', 'Sparepart - Home')

@section('content')
<!-- page banner area start -->
<div class="page-banner">
    <img src="{{ asset('assets/img/bg3.png') }}" alt="Page Banner" />
</div>
<!-- page banner area end -->
		<!-- product content section start -->
		<section class="product-content section-padding">
			<div class="container">
				<div class="row">
					<div class="tab-content">
						<div class="tab-pane fade in active text-center" id="grid">
							<div class="single-products">
								@foreach ($items as $item)
								<div class="col-xs-12 col-sm-4">
									<div class="product-item margin40">
										<div class="pro-img">
											<a href="itemdetails/{{ $item->id }}"><img src="{{ asset('uploads-images/items/').'/'.$item->image }}" alt="{{ $item->name }}"></a>
										</div>
										<div class="product-title">
											<a href="itemdetails/{{ $item->id }}"><h5>{{$item->name}}</h5></a>
											<p><span>{{ 'Rp '.number_format($item->price, 0, ',', '.') }}</span></p>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- product content section end -->
@endsection