<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirm Order</title>
</head>
<body>
    <p class="">Your order was successful, and will be held for 24 hours from @php echo(now()) @endphp.
      <br>
      Hurry up! Let's come to our store and get it.
    </p>
    <h3 class=" mt-40">Order details</h3>
    <table style="width:80%">
        <thead>
          <tr>
            <th class="">Your Book</th>
            <th class="">Quantity</th>
            <th class="">Total Price</th>
            <th class="">Time</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
                <p class="">{{ $order->product_name }} - {{ $order->product_author }}</p>
            </td>
            <td><p class="">{{ $order->quantity }}</p></td>
            <td>
                <p class="">{{ $order->quantity }} x ${{ $order->product_price }} = ${{ ($order->quantity)*($order->product_price) }}</p>
            </td>
            <td>
                <p class="">From {{ $order->start }} To {{ $order->end }}</p>
            </td>
          </tr>
        </tbody>
    </table>
    <table>
        <thead>
          <tr>
            <th>
                @component('mail::button', ['url' => route('home')])
                  Get More Books
                @endcomponent
            </th>
          </tr>
        </thead>
    </table>
</body>
</html>