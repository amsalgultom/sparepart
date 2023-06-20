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
								<th>Order ID</th>
								<th>Tanggal</th>
								<th>Pengiriman</th>
								<th>Total</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($myorders as $order)
							<tr>
								<td>#{{$order->id}}</td>
								<td>{{ \Carbon\Carbon::parse($order->date)->format('d M Y') }}</td>
								<td>{{$order->shipping_method}} - {{ 'Rp '.number_format($order->shipping_cost, 0, ',', '.') }}</td>
								<td>{{ 'Rp '.number_format($order->total, 0, ',', '.') }}</td>
								<td>{{$order->status?->name}}</td>
								<td><a href="{{ route('orders.show',$order->id) }}">Detail</a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- cart page content section end -->
@endsection