<?php

namespace App\Http\Controllers\Bungadavi\Transaction;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Location\City;
use App\Models\Client\Florist;
use App\Models\Location\Country;
use App\Models\Location\Village;
use App\Models\Location\ZipCode;
use App\Models\Location\District;
use App\Models\Location\Province;
use App\Models\Transaction\Order;
use App\Models\Transaction\Payment;
use App\Models\Transaction\Product;
use App\Http\Controllers\Controller;
use App\Models\BasicSetting\OurBank;
use App\Models\Transaction\Delivery;
use App\Models\Transaction\Schedule;
use App\Models\Client\FloristRecipient;
use App\DataTables\Order\OrderDataTable;
use App\Models\Client\PersonalRecipient;
use App\Models\Transaction\ProductCustom;
use App\Models\Transaction\SenderReceiver;
use App\Models\BasicSetting\DeliveryRemark;
use App\Models\Product\Product as ProductStock;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OrderDataTable $datatables)
    {
        $data = [
            'title'         => 'Order Transaction Management',
            'subtitle'      => 'Order List',
            'description'   => 'For Management Order Transaction',
            'breadcrumb'    => ['Order Transaction Management', 'Product List'],
            'button'        => ['name' => 'Add Order', 'link' => 'bungadavi.orders.create'],
        ];

        return $datatables->render('bungadavi.orders.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title'         => 'Order Transaction Management',
            'subtitle'      => 'Order List',
            'description'   => 'For Management Order Transaction',
            'breadcrumb'    => ['Order Transaction Management', 'Product List'],
            'button'        => ['name' => 'Add Order', 'link' => 'bungadavi.orders.create'],
            'products'          => ProductStock::all(),
            'deliveryRemarks'   => DeliveryRemark::all(),
            'ourBank'           => OurBank::all()
        ];

        return view('bungadavi.orders.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {

            // validasi

            if ($request->sender_recipient['is_create_new']) {
                switch ($request->sender_recipient['client_type']) {
                    case 'corporate':

                        break;

                    case 'affiliate':
                        $recipient = new FloristRecipient();
                        $recipient->fullname    = $request->sender_recipient['receiver_name'];
                        $recipient->phone       = $request->sender_recipient['receiver_phone_number'];
                        $recipient->address     = $request->sender_recipient['receiver_address'];
                        $recipient->country_id  = Country::where('name', $request->sender_recipient['receiver_country'])->first()->id;
                        $recipient->province_id = Province::where('name', $request->sender_recipient['receiver_province'])->first()->id;
                        $recipient->city_id     = City::where('name', $request->sender_recipient['receiver_city'])->first()->id;
                        $recipient->district_id = District::where('name', $request->sender_recipient['receiver_district'])->first()->id;
                        $recipient->village_id  = Village::where('name', $request->sender_recipient['receiver_village'])->first()->id;
                        $recipient->zipcode_id  = ZipCode::where('postal_code', $request->sender_recipient['receiver_zipcode'])->first()->id;
                        $recipient->client_affiliate_uuid = $request->sender_recipient['client_uuid'];
                        $recipient->save();
                        break;

                    case 'personal':
                        $recipient = new PersonalRecipient();
                        $recipient->firstname   = $request->sender_recipient['receiver_name'];
                        $recipient->phone       = $request->sender_recipient['receiver_phone_number'];
                        $recipient->address     = $request->sender_recipient['receiver_address'];
                        $recipient->country_id  = Country::where('name', $request->sender_recipient['receiver_country'])->first()->id;
                        $recipient->province_id = Province::where('name', $request->sender_recipient['receiver_province'])->first()->id;
                        $recipient->city_id     = City::where('name', $request->sender_recipient['receiver_city'])->first()->id;
                        $recipient->district_id = District::where('name', $request->sender_recipient['receiver_district'])->first()->id;
                        $recipient->village_id  = Village::where('name', $request->sender_recipient['receiver_village'])->first()->id;
                        $recipient->zipcode_id  = ZipCode::where('postal_code', $request->sender_recipient['receiver_zipcode'])->first()->id;
                        $recipient->client_personal_uuid = $request->sender_recipient['client_uuid'];
                        $recipient->save();

                        break;

                    default:
                        # code...
                        break;
                }
            }

            // insert order
            $codeOrderTransaction = date('Ymdhis');
            switch ($request->order_transaction['type_order_transaction']) {
                case 'backoffice_bungadavi':
                    $codeOrderTransaction = "SBD";
                    switch ($request->sender_recipient['client_type']) {
                        case 'personal':
                            $codeOrderTransaction = $codeOrderTransaction . "O";
                            break;
                        case 'corporate':
                            $codeOrderTransaction = $codeOrderTransaction . "C";
                            break;
                        case 'affiliate':
                            $codeOrderTransaction = $codeOrderTransaction . "O";
                            break;
                        default:
                            $codeOrderTransaction = $codeOrderTransaction . "U";
                            break;
                    }
                    $codeOrderTransaction = $codeOrderTransaction . date('Ymdhis') . str_pad(Order::all()->count(), 4, "0", STR_PAD_LEFT);
                    break;
                default:
                    # code...
                    break;
            }

            $order = [
                "code_order_transaction"            => $codeOrderTransaction,
                "type_order_transaction"            => $request->order_transaction['type_order_transaction'],
                "total_order_transaction"           => $request->order_transaction['total_order_transaction'],
                "shipping_price_order_transaction"  => $request->order_transaction['shipping_price_order_transaction'],
                "status_order_transaction"          => $request->order_transaction['status_order_transaction'],
                // "currency_id"                       => $request->order_transaction['currency_id'],
                "is_guest"                          => $request->order_transaction['is_guest'],
                'card_message_category'             => $request->order_transaction['card_message_category'],
                'card_message_subcategory'          => $request->order_transaction['card_message_subcategory'],
                'card_message_message'              => $request->order_transaction['card_message_message'],
            ];

            $orderTransaction = Order::create($order);

            // insert sender receiver
            $sender = [
                'order_transactions_uuid'   => $orderTransaction->uuid,
                'client_type'               => $request->sender_recipient['client_type'],
                'client_uuid'               => $request->sender_recipient['client_uuid'],
                'is_secret'                 => $request->sender_recipient['is_secret'],
                'pic_name'                  => $request->sender_recipient['pic_name'],
                'sender_name'               => $request->sender_recipient['sender_name'],
                'po_referrence'             => $request->sender_recipient['po_referrence'],
                'sender_phone_number'       => $request->sender_recipient['sender_phone_number'],
                'sender_address'            => $request->sender_recipient['sender_address'] ?? "",
                'sender_country'            => $request->sender_recipient['sender_country'],
                'sender_province'           => $request->sender_recipient['sender_province'],
                'sender_city'               => $request->sender_recipient['sender_city'],
                'sender_district'           => $request->sender_recipient['sender_district'],
                'sender_village'            => $request->sender_recipient['sender_village'],
                'sender_zipcode'            => $request->sender_recipient['sender_zipcode'],
                'sender_latitude'           => null,
                'sender_longitude'          => null,
                'receiver_name'             => $request->sender_recipient['receiver_name'],
                'receiver_phone_number'     => $request->sender_recipient['receiver_phone_number'],
                'receiver_address'          => $request->sender_recipient['receiver_address'],
                'receiver_country'          => $request->sender_recipient['receiver_country'],
                'receiver_province'         => $request->sender_recipient['receiver_province'],
                'receiver_city'             => $request->sender_recipient['receiver_city'],
                'receiver_district'         => $request->sender_recipient['receiver_district'],
                'receiver_village'          => $request->sender_recipient['receiver_village'],
                'receiver_zipcode'          => $request->sender_recipient['receiver_zipcode'],
                'receiver_latitude'         => null,
                'receiver_longitude'        => null,
            ];

            $sender = SenderReceiver::create($sender);

            // insert delivery order
            $deliveryOrder = [
                'order_transactions_uuid'   => $orderTransaction->uuid,
                'sender_receiver_uuid'      => $sender->uuid,
                'delivery_date'             => $request->delivery_schedule['delivery_date'],
                'delivery_charge'           => $request->delivery_schedule['delivery_charge'],
                'time_slot_name'            => $request->delivery_schedule['time_slot_name'],
                'time_slot_charge'          => $request->delivery_schedule['time_slot_charge'],
                'time_slot_id'              => $request->delivery_schedule['time_slot_id'],
                'delivery_remarks'          => $request->delivery_schedule['delivery_remarks'],
                'internal_notes'            => $request->delivery_schedule['delivery_remarks'],
            ];

            $deliveryOrder = Delivery::create($deliveryOrder);

            // insert payment order
            $paymentOrder = [
                'order_transactions_uuid'   => $orderTransaction->uuid,
                'sender_receiver_uuid'      => $sender->uuid,
                'status_payment_order'      => 'unpaid',
                'proof_of_payment_order'    => null,
                'data_payment_order'        => $request->payment_order['data_payment_order'],
                'payment_type_uuid'         => $request->payment_order['payment_type_uuid'],
            ];

            $paymentOrder = Payment::create($paymentOrder);

            // insert product list and custom product list
            foreach ($request->list_product_order as $key => $product) {
                $productData = [
                    'order_transactions_uuid'   => $orderTransaction->uuid,
                    'product_uuid'              => $product['product_uuid'],
                    'code_product'              => $product['code_product'],
                    'name_product'              => $product['name_product'],
                    'qty_product'               => $product['qty_product'] ?? 1,
                    'price_product'             => $product['price_product'],
                    'from_message_product'      => $product['from_message_product'] ?? "",
                    'to_message_product'        => $product['to_message_product'] ?? "",
                    'remarks_product'           => $product['remarks_product'] ?? "",
                ];

                $orderProduct = Product::create($productData);

                // if ($product['custom_product']) {

                //     foreach ($product['custom_product'] as $key => $custom) {
                //         $productCustom = [
                //             'list_product_uuid'         => $orderProduct->uuid,
                //             'products_material_uuid'    => $custom['products_material_uuid'],
                //             'name_stock'                => $custom['name_stock'],
                //             'qty_stock'                 => $custom['qty_stock'],
                //         ];

                //         ProductCustom::create($productCustom);
                //     }

                // }
            }

            return response(['message' => 'ok']);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function assignFlorist(Request $request, $id)
    {
        $order = Order::find($id);
        $order->florist_uuid = $request->florist_uuid;
        return response()->json($order->save());
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status_order_transaction = $request->status;
        return response()->json($order->save());
    }

    public function realTimeOrder()
    {
        $today = Carbon::now()->format('Y-m-d');
        $tomorrow = Carbon::now()->add(1, 'day')->format('Y-m-d');

        $data = [
            'title'         => 'Real Time Order',
            'subtitle'      => 'Real Time Order List',
            'description'   => 'For List Real Time Order',
            'breadcrumb'    => ['Real Time Order Management', 'Order List'],
            'button'        => ['name' => 'Add Order', 'link' => 'bungadavi.orders.create'],
            'data'          => [
                'orderToday'    => Schedule::whereDate('delivery_date', $today)->get(),
                'orderTomorrow' => Schedule::whereDate('delivery_date', ">", $tomorrow)->get(),
            ]
        ];

        return view('bungadavi.orders.realtime_order', $data);

    }
}
