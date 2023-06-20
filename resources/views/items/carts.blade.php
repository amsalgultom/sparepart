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
		<div class="row">
			<div class="col-xs-12">
				<div class="table-responsive table-one margin-minus section-padding-bottom">
					<table class="spacing-table text-center">
						<thead>
							<tr>
								<th>Image</th>
								<th>Name</th>
								<th>Unit Price</th>
								<th>QTY</th>
								<th>Subtotal</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($itemCart as $cart)
							<tr>
								<td>
									<a href="#"><img src="{{ asset('uploads-images/items/').'/'.$cart->image }}" height="200" alt="Add Product" /></a>
								</td>
								<td>
									<div class="items-dsc">
										<p><a href="#">{{$cart->name}}</a></p>
									</div>
								</td>
								<td>{{ 'Rp '.number_format($cart->price, 0, ',', '.') }}</td>
								<td>
									<form action="#" method="POST">
										<div class="plus-minus">
											<input type="number" value="{{$cart->qty}}" name="qtybutton" min="1" onchange="buttonQty(this,'{{$cart->cart_id}}')" style="width: 30%;">
										</div>
									</form>
								</td>
								<td>{{ 'Rp '.number_format($cart->subtotal, 0, ',', '.') }}</td>

								<td>
									<form action="{{ route('items.destroy') }}" method="POST">
										@csrf
										<input type="hidden" name="id" value="{{ $cart->cart_id }}">
										<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
										<button type="submit"><i class="fa fa-trash"></i></button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row" style="display: flex;justify-content: end;">
			<div class="col-sm-4">
				<div class="estimate-text responsive">
					<div class="subtotal clearfix">
						<p>Total: <span class="floatright">{{ 'Rp '.number_format($total, 0, ',', '.') }}</span></p>
					</div>
					<div class="default-btn text-right">
						<a class="btn-style" href="{{ route('orders.checkout',Auth::user()->id) }}">PROCCED TO CHECKOUT</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<form action="{{ route('items.update') }}" method="POST" style="display: none !important;">
	@csrf
	<input type="hidden" name="update_id_cart" id="update_id_cart">
	<input type="hidden" name="update_user_id" value="{{ Auth::user()->id }}">
	<input type="hidden" name="update_qty" id="update_qty">
	<button type="submit" id="btn-update-qty"></i></button>
</form>

<!-- cart page content section end -->
@endsection


@push('scripts')
<script>
	function buttonQty(val, id) {
		$('#update_qty').val(val.value);
		$('#update_id_cart').val(id);
		$("#btn-update-qty").trigger('click'); 
	}
</script>

@endpush