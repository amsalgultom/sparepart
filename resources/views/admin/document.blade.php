<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Invoice Sales Order</title>

  <style>
    .invoice-box {
      max-width: 800px;
      margin: auto;
      padding: 30px;
      border: 1px solid #eee;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
      font-size: 16px;
      line-height: 24px;
      font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
      color: #555;
    }

    .invoice-box table {
      width: 100%;
      line-height: inherit;
      text-align: left;
    }

    .invoice-box table td {
      padding: 5px;
      vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
      text-align: right;
    }

    .invoice-box table tr.top table td {
      padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
      font-size: 45px;
      line-height: 45px;
      color: #333;
    }

    .invoice-box table tr.information table td {
      padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
      background: #eee;
      border-bottom: 1px solid #ddd;
      font-weight: bold;
    }

    .invoice-box table tr.details td {
      padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
      border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
      border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
      border-top: 2px solid #eee;
      font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
      .invoice-box table tr.top table td {
        width: 100%;
        display: block;
        text-align: center;
      }

      .invoice-box table tr.information table td {
        width: 100%;
        display: block;
        text-align: center;
      }
    }

    /** RTL **/
    .invoice-box.rtl {
      direction: rtl;
      font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .invoice-box.rtl table {
      text-align: right;
    }

    .invoice-box.rtl table tr td:nth-child(2) {
      text-align: left;
    }

    .text-right {
      text-align: right !important;
    }

    .text-left {
      text-align: left !important;
    }
  </style>
</head>

<body>
  <div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
      <tr class="top">
        <td colspan="5">
          <table>
            <tr>
              <td>
                <h2>PT. Pelita Nusa Wiratama</h2>
              </td>

              <td>
                OrderId #: {{ $order->id }}<br />
                @if($order->no_resi != '')
                No Resi : {{ $order->no_resi }}<br />
                @endif
                Date: {{ $date }}<br />
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr class="information">
        <td colspan="5">
          <table>
            <tr>
              <td>
                <strong>Pelanggan:</strong> <br>
                {{ $order->customer?->name }}<br>
              </td>
              <td>
                <strong>Pengiriman:</strong> <br>
                {{ $order->customer?->address }}<br>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    
    <table cellpadding="0" cellspacing="0">

      <tr class="heading text-left">
        <td class="text-left">Item</td>
        <td class="text-left">Price</td>
        <td class="text-left">QTY</td>
        <td></td>
        <td class="text-left">Sub Total</td>
      </tr>

      @foreach($itemOrderProduct as $item)
      <tr class="total text-left">
        <td class="text-left">{{ $item->name }}</td>
        <td class="text-left">{{ 'Rp '.number_format($item->price, 0, ',', '.') }}</td>
        <td class="text-left">{{ $item->qty }}</td>
        <td></td>
        <td class="text-left">{{ 'Rp '.number_format($item->price * $item->qty, 0, ',', '.') }}</td>
      </tr>
      @endforeach
      <tr class="total text-left">
        <td class="text-left">Kurir - {{ $order->shipping_method }}</td>
        <td></td>
        <td></td>
        <td></td>
        <td class="text-left">{{ 'Rp '.number_format($order->shipping_cost, 0, ',', '.') }}</td>
      </tr>
    </table>
    <div class="text-center">
      <h3>Total : {{ 'Rp '.number_format($order->total, 0, ',', '.') }}</h3>
    </div>
  </div>
</body>

</html>