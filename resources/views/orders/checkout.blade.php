@extends('layout-customers.app')
@section('title', 'Sparepart - Home')

@section('content')
<!-- page banner area start -->
<div class="page-banner">
	<img src="{{ asset('assets/img/bg3.png') }}" alt="Page Banner" />
</div>
<!-- page banner area end -->
<!-- cart page content section start -->
<section class="cart-page section-padding">
	<div class="container">
		<form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
			@csrf
			<div class="row">
				<div class="col-sm-6">
					<div class="row">
						<div class="single-check responsive">
							<div class="single-input p-bottom50 clearfix">
								<div class="col-xs-12">
									<div class="check-title">
										<h3>Billing Address</h3>
									</div>
								</div>
								<div class="col-xs-12">
									<label>Nama Lengkap:</label>
									<div class="input-text">
										<input type="text" name="name" />
									</div>
								</div>
								<div class="col-xs-12">
									<label>Alamat:</label>
									<div class="input-text">
										<input type="text" name="address" />
									</div>
								</div>
								<div class="col-xs-12">
									<label>City/Town:</label>
									<select name="city" id="origin" class="form-control w-100" required>
										<option value="" hidden>-- Pilih Kota --</option>
										@foreach ($origins as $origin)
										<option value="{{ $origin['city_id'] }}">{{ $origin['city_name'] }}</option>
										@endforeach
									</select><br>
								</div>
								<div class="col-sm-6">
									<label>Email:</label>
									<div class="input-text">
										<input type="text" name="email" />
									</div>
								</div>
								<div class="col-sm-6">
									<label>Phone:</label>
									<div class="input-text">
										<input type="text" name="phone" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="single-check p-bottom50 clearfix">
						<div class="check-title">
							<h3>Your Orders</h3>
						</div>
						<div class="table-responsive table-two">
							<table class="order-table text-center">
								<thead>
									<tr>
										<th>Product</th>
										<th>Quantity</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>

									@foreach($itemCart as $cart)
									<tr>
										<td class="td-text">
											<div class="order-dsc">
												<p><a href="#">{{$cart->name}} </a></p>
											</div>
										</td>
										<td>
											{{$cart->qty}}
										</td>
										<td>{{ 'Rp '.number_format($cart->subtotal, 0, ',', '.') }}</td>
									</tr>
									<input type="hidden" name="item_id[]" value="{{$cart->item_id}}">
									<input type="hidden" name="qty[]" value="{{$cart->qty}}">
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="single-check accordion-one">
						<ul id="accordion" class="panel-group clearfix">
							<input type="hidden" name="destination" id="destination" value="151">
							<input type="hidden" id="weight" value="{{ $totalWeight }}">
							<h4 class="mt-5 mb-3">Layanan Pengiriman:</h4><br>
							<div id="results">
							</div>
						</ul>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="single-check p-bottom50">
						<div class="check-title">
							<h3>Jumlah Pembayaran</h3>
						</div>
						<div class="subtotal clearfix">
							<p>Cart Subtotal <strong class="floatright" id="subtotalCheckoutText">{{ 'Rp '.number_format($total, 0, ',', '.') }}</strong></p>
							<p>Shipping <strong class="floatright" id="priceShippingText">-</strong></p>
							<p>Total <strong class="floatright"><span id="totalCheckoutText">{{ 'Rp '.number_format($total, 0, ',', '.') }}</span></strong></p>
						</div>
					</div>

					<div class="single-check accordion-one">
						<ul id="accordion" class="panel-group clearfix">
							<input type="hidden" name="destination" id="destination" value="151">
							<input type="hidden" id="weight" value="{{ $totalWeight }}">
							<h4 class="mt-5 mb-3">Cara Pembayaran</h4><br>
							<h5>Lakukan transfer pada QRIS berikut :</p><br>
								<div class="zoom-gallery text-center">
									<img src="{{ asset('assets/img/qris.jpg') }}" width="200" alt="">
									<a href="{{ asset('assets/img/qris.jpg') }}" title="Product Title" tabindex="0">
										<img src="http://127.0.0.1:8000/assets/img/icon/zoom.png" alt=""></a>
								</div><br>
								<!-- <img src="{{ asset('assets/img/qris.jpg') }}" alt=""> -->
								<p>Upload Bukti Pembayaran </p>
								<input type="file" name="upload_image_pament">
						</ul>
					</div>
				</div>
				<div class="text-center">
					<input type="hidden" name="subtotalCheckout" id="subtotalCheckout" value="{{$total}}">
					<input type="hidden" name="priceShipping" id="priceShipping">
					<input type="hidden" name="totalCheckout" id="totalCheckout">
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
					<button type="submit" class="btn-style" href="#">Konfirmasi Order</button>
				</div>
			</div>
		</form>
	</div>
</section>
<!-- cart page content section end -->
@endsection


@push('scripts')
<script>
	function buttonQty(val, id) {
		$('#update_qty').val(val.value);
		$('#update_id_cart').val(id);
		$("#btn-update-qty").trigger('click');
	}

	function buttonOngkirModel(price) {
		var formattedCost = 'N/A';
		var subtotal = $('#subtotalCheckout').val();
		var sum = parseInt(price.value) + parseInt(subtotal);
		var total = $('#totalCheckout').val(sum)

		console.log(sum)

		formattedCost = 'Rp ' + price.value.toLocaleString('id-ID', {
			minimumFractionDigits: 0
		});
		formattedCostTotal = 'Rp ' + sum.toLocaleString('id-ID', {
			minimumFractionDigits: 0
		});

		$('#priceShippingText').text(formattedCost)
		$('#totalCheckoutText').text(formattedCostTotal)
		$('#priceShipping').val(price.value)
	}

	$(document).ready(function() {
		$('#origin').change(function() {
			var originId = $('#origin').val();
			var destinationId = $('#destination').val();
			var weight = $('#weight').val();

			$.ajax({
				url: '/calculate-shipping',
				method: 'GET',
				data: {
					origin_id: originId,
					destination_id: destinationId,
					weight: weight
				},
				success: function(response) {
					var results = response.results;

					$('#results').empty();

					if (results.length === 0) {
						$('#results').append('<div>No shipping costs found.</div>');
					} else {
						$.each(results, function(index, result) {
							var html = '<h5>' + result.name + '</h5>';

							if (result.costs && result.costs.length > 0) {
								$.each(result.costs, function(i, cost) {
									var formattedCost = 'N/A';
									if (cost.cost.length > 0) {
										formattedCost = 'Rp ' + cost.cost[0].value.toLocaleString('id-ID');
									}
									html += '<li class="panel">';
									html += '<div data-toggle="collapse" data-parent="#accordion" data-target="#collapse' + cost.cost[0].value + '">';
									html += '<div class="custom-radio">';
									html += '<input id="shipping_cost' + cost.cost[0].value + '" type="radio" name="shipping_cost" onchange="buttonOngkirModel(this)" value="' + cost.cost[0].value + '" required>';
									html += '<label for="shipping_cost' + cost.cost[0].value + '"><span>' + cost.service + '</span></label>';
									html += '</div>';
									html += '</div>';
									html += '<div class="panel-collapse" id="collapse' + cost.cost[0].value + '">';
									html += '<div class="prayment-dsc">';
									html += '<p> ' + cost.description + '</p>';
									html += '<p>Harga: ' + formattedCost + '</p>';
									html += '</div>';
									html += '</div>';
									html += '</li>';
								});
							} else {
								html += '<div>No shipping costs found for this service.</div>';
								html += '<hr>';
							}

							$('#results').html(html);
						});
					}
				},
				error: function(xhr) {
					console.log(xhr.responseText);
				}
			});
		});

	});
</script>

@endpush