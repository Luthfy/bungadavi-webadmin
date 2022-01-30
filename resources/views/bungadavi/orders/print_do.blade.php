<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-size: 11px;
        }

        .table-order {
            border-left: 1px solid #333;
            border-right: 0;
            border-top: 1px solid #333;
            border-bottom: 0;
            border-collapse: collapse;
        }

        .table-order td,
        .table-order th {
            border-left: 0;
            border-right: 1px solid #333;
            border-top: 0;
            border-bottom: 1px solid #333;
        }


        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table-bordered {
            border: 1px solid black;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .mb-max {
            margin-bottom: 5em;
        }
        html {
            margin-top: 20px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>


    <div class="container">
        <div class="row">
            <table class="table" style="margin-bottom: 1rem">
                <tr>
                    <td>
                        <img style="width: 200px" src='data:image/png;base64,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'/>
                        {{-- <img src="data:image/png;base64,{{$logo}}" alt="" style="width: 100px;"> --}}
                    </td>
                    <td>
                        <p class="text-right" style="padding-bottom: 0px; margin-bottom: 0px;"> <strong>PT. BUNGA DAVI INDONESIA</strong> <br>Jl. Sasak II NO. 69B, Kelapa Dua - Kebon Jeruk <br>Jakarta Barat 11550, Indonesia, Call Center : 021 - 22530466</p>

                        <h3 class="text-right">DELIVERY ORDER</h3>
                    </td>
                </tr>
            </table>

            <table class="table" style="margin-bottom:10px">
                <tr>
                    <td><strong>DO Number</strong></td>
                    <td>{{ $order->code_order_transaction }}</td>
                    <td><strong>Delivery Date</strong></td>
                    <td>{{ Carbon\Carbon::parse($order->delivery_schedule()->first()->delivery_date)->format('d M Y') }}</td>
                </tr>
                <tr>
                    <td><strong>Sender</strong></td>
                    <td>{{ $order->sender_receiver()->first()->sender_name }}</td>
                    <td><strong>Timeslot</strong></td>
                    <td>{{ $order->delivery_schedule()->first()->time_slot_name }}</td>
                </tr>
            </table>

            <table class="table table-bordered table-order">
                <tr>
                    <th>No</th>
                    <th>Code</th>
                    <th>Item</th>
                    <th>QTY</th>
                </tr>
                @foreach ($order->products()->get() as $key => $item)
                <tr style="text-align: center; padding: 1px;">
                    <td>{{ ++$key }}</td>
                    <td>{{ $item->code_product }}</td>
                    <td>{{ $item->name_product }}</td>
                    <td>{{ $item->qty_product }}</td>
                </tr>
                @endforeach
            </table>

            <table class="table">
                <tr>
                    <td style="width: 50%">
                        <p class="mt-2">{{ $order->sender_receiver()->first()->receiver_name }} <br>
                        {{ $order->sender_receiver()->first()->receiver_address_info }} <br>
                        {{ $order->sender_receiver()->first()->receiver_address }}
                        {{ $order->sender_receiver()->first()->receiver_country }}
                        {{ $order->sender_receiver()->first()->receiver_province }}
                        {{ $order->sender_receiver()->first()->receiver_city }}
                        {{ $order->sender_receiver()->first()->receiver_district }}
                        {{ $order->sender_receiver()->first()->receiver_village }}
                        {{ $order->sender_receiver()->first()->receiver_zipcode }}
                        {{ $order->sender_receiver()->first()->receiver_phone_number }} </p>
                    </td>
                    <td style="width: 50%">
                        <h3>Delivery Remarks : </h3>
                        <div class="table-bordered" style="border-radius: 4px; padding:8px;">
                            {{ $order->delivery_schedule()->first()->delivery_remarks }}
                        </div>
                    </td>
                </tr>
            </table>

            <p><strong>IMPORTANT!</strong> Acceptance by the signatory confirms that all goods mentioned above were received in good condition.</p>

            <table class="table">
                <tr>
                    <td style="max-width: 50%">
                        <p class="text-center mb-max">
                            Accepted By
                        </p>
                        <p class="text-center">
                            ( ___________________ )
                        </p>
                    </td>
                    <td style="max-width: 50%">
                        <p class="text-center mb-max">
                            Delivered By
                        </p>
                        <p class="text-center">
                            ( {{$order->delivery_schedule()->first()->courier_uuid ?? ' ___________________ ' }} )
                        </p>
                    </td>
                </tr>
            </table>
        </div>
    </div>

</body>
</html>
