<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-size: 14px;
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
                        {{$logo}}
                        {{-- <img src="data:image/png;base64,{{$logo}}" alt="" style="width: 100px;"> --}}
                    </td>
                    <td>
                        <p class="text-right" style="padding-bottom: 0px; margin-bottom: 0px;">PT. BUNGA DAVI INDONESIA <br>Jl. Sasak II NO. 69B, Kelapa Dua - Kebon Jeruk <br>Jakarta Barat 11550, Indonesia, Call Center : 021 - 22530466</p>

                        <h3 class="text-right">DELIVERY ORDER</h3>
                    </td>
                </tr>
            </table>

            <table class="table" style="margin-bottom:10px">
                <tr>
                    <td><strong>DO Number</strong></td>
                    <td>{{ $order->code_order_transaction }}</td>
                    <td><strong>Delivery Date</strong></td>
                    <td>{{ $order->delivery_schedule()->first()->delivery_date }}</td>
                </tr>
                <tr>
                    <td><strong>Sender</strong></td>
                    <td>{{ $order->from_message_order }}</td>
                    <td><strong>Timeslot</strong></td>
                    <td>{{ $order->delivery_schedule()->first()->time_slot_name }}</td>
                </tr>
            </table>

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Code</th>
                    <th>Item</th>
                    <th>QTY</th>
                </tr>
                @foreach ($order->products()->get() as $key => $item)
                <tr>
                    <td class="text-center">{{ ++$key }}</td>
                    <td class="text-center">{{ $item->code_product }}</td>
                    <td class="text-center">{{ $item->name_product }}</td>
                    <td class="text-center">{{ $item->qty_product }}</td>
                </tr>
                @endforeach
            </table>

            <table class="table">
                <tr>
                    <td style="max-width: 50%">

                    </td>
                    <td style="max-width: 50%">

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
