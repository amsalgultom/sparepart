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
        <div width="100%">
            <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
                <tbody>
                    <tr>
                        <td align="center" valign="top">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:#fff;border:1px solid #dedede;border-radius:3px" bgcolor="#fff">
                                <tbody>
                                    <tr>
                                        <td align="center" valign="top">
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%" id="m_7158390659536495837template_body">
                                                <tbody>
                                                    <tr>
                                                        <td valign="top" id="m_7158390659536495837body_content" style="background-color:#fff" bgcolor="#fff">
                                                            <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td valign="top" style="padding:48px 48px 0px">
                                                                            <div id="m_7158390659536495837body_content_inner" style="color:#636363;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left" align="left">
                                                                                <div style="display: flex;justify-content: space-between;">
                                                                                    <h2 style="color:#7a6429;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;">
                                                                                        [<span class="il">Order</span> #{{ $order->id }}] | {{ \Carbon\Carbon::parse($order->date)->format('d M Y') }}
                                                                                    </h2>
                                                                                    <h2 style="color:#7a6429;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;">
                                                                                        Status : {{$order->status?->name}} <br>
                                                                                        @if($order->no_resi != '')
                                                                                        No Resi : {{$order->no_resi}}
                                                                                        @endif
                                                                                    </h2>
                                                                                    
                                                                                </div>
                                                                                <div style="margin-bottom:40px">
                                                                                    <table cellspacing="0" cellpadding="6" border="1" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;width:100%;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif" width="100%">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left" align="left">Item</th>
                                                                                                <th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left" align="left">Qty</th>
                                                                                                <th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left" align="left">Price</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @foreach ($itemOrderProduct as $itemproduct)
                                                                                            <tr>
                                                                                                <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;word-wrap:break-word" align="left">
                                                                                                    {{$itemproduct->name}}
                                                                                                </td>
                                                                                                <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif" align="left">
                                                                                                    {{$itemproduct->qty}}
                                                                                                </td>
                                                                                                <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif" align="left">
                                                                                                    {{ 'Rp '.number_format($itemproduct->price, 0, ',', '.') }}
                                                                                                </td>
                                                                                            </tr>
                                                                                            @endforeach
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top">

                                            <table border="0" cellpadding="0" cellspacing="0" width="100%" id="m_7158390659536495837template_body">
                                                <tbody>
                                                    <tr>
                                                        <td valign="top" id="m_7158390659536495837body_content" style="background-color:#fff" bgcolor="#fff">
                                                            <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td valign="top" style="padding:0px 48px">
                                                                            <div id="m_7158390659536495837body_content_inner" style="color:#636363;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left" align="left">
                                                                                <div style="margin-bottom:40px">
                                                                                    <table cellspacing="0" cellpadding="6" border="1" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;width:100%;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif" width="100%">
                                                                                        <tr>
                                                                                            <th scope="row" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;" align="left">Pelanggan:</th>
                                                                                            <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;" align="left"><span>{{ $order->customer?->name}}</span></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;" align="left">Subtotal:</th>
                                                                                            <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;" align="left"><span>{{ 'Rp '.number_format($order->total - $order->shipping_costs, 0, ',', '.') }}</span></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left" align="left">Shipping:</th>
                                                                                            <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left" align="left">
                                                                                                <span>{{ 'Rp '.number_format($order->shipping_cost, 0, ',', '.') }}</span>&nbsp;<small>via ({{ $order->shipping_method }}) <br>{{ $order->customer?->address}}</small>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left" align="left">Total:</th>
                                                                                            <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left" align="left">
                                                                                                <span>{{ 'Rp '.number_format($order->total, 0, ',', '.') }}</span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        </tfoot>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="row">
                                                <div class="col-12 mb-2">
                                                    <h4><b>Bukti Pembayaran</b></h4>
                                                </div>
                                                <div class="col-12">
                                                    <img src="{{ asset('/').$order->image_payment }}" width="400" alt="Add Product" />
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection