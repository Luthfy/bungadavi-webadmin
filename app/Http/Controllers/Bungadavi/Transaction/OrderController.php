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
use App\Models\Courier\CourierTask;
use App\Models\Transaction\Payment;
use App\Models\Transaction\Product;
use App\Models\Transaction\Receipt;
use App\Http\Controllers\Controller;
use App\Models\BasicSetting\OurBank;
use App\Models\Transaction\Delivery;
use App\Models\Transaction\Schedule;
use App\Models\BasicSetting\TimeSlot;
use App\Models\Client\FloristRecipient;
use App\DataTables\Order\OrderDataTable;
use App\Models\Client\PersonalRecipient;
use App\DataTables\Order\ReturnDataTable;
use App\Models\Transaction\ProductCustom;
use App\Models\Transaction\SenderReceiver;
use App\DataTables\Order\NewOrderDataTable;
use App\Models\BasicSetting\DeliveryRemark;
use App\DataTables\Product\ProductDataTable;
use App\DataTables\Order\OnDeliveryDataTable;
use App\DataTables\Order\AcceptOrderDataTable;
use App\DataTables\Order\CancelOrderDataTable;
use App\Models\Product\Product as ProductStock;
use App\DataTables\Order\DeliveredOrderDataTable;
use App\DataTables\Order\OnDeliveryOrderDataTable;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\App;

class OrderController extends Controller
{
    public function getTabAcceptOrderDataTable(AcceptOrderDataTable $datatables)
    {
        return $datatables->render('bungadavi.orders.index');
    }

    public function getTabNewOrderDataTable(NewOrderDataTable $datatables)
    {
        return $datatables->render('bungadavi.orders.index');
    }

    public function getTabOnDeliveryOrderDataTable(OnDeliveryDataTable $datatables)
    {
        return $datatables->render('bungadavi.orders.index');
    }

    public function getTabReturnedOrderDataTable(ReturnDataTable $datatables)
    {
        return $datatables->render('bungadavi.orders.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize("view order");
        $data = [
            'title'         => 'Order Transaction Management',
            'subtitle'      => 'Order List',
            'description'   => 'For Management Order Transaction',
            'breadcrumb'    => ['Order Transaction Management', 'Product List'],
            'button'        => ['name' => 'Add Order', 'link' => 'bungadavi.orders.create'],
            'linkUpdateStatus'  => (auth()->user()->hasRole('bungadavi') ? url('bungadavi/transaction') : url('affiliate/transaction')),
            'datatables'        => [
                'new_order'     => (new NewOrderDataTable())->html()->minifiedAjax(route('bungadavi.orders.ajax.neworder')),
                'accept_order'  => (new AcceptOrderDataTable())->html()->minifiedAjax(route('bungadavi.orders.ajax.acceptorder')),
                'on_delivery'   => (new OnDeliveryDataTable())->html()->minifiedAjax(route('bungadavi.orders.ajax.ondelivery')),
                'return'        => (new ReturnDataTable())->html()->minifiedAjax(route('bungadavi.orders.ajax.returned'))
            ]
        ];

        return view('bungadavi.orders.index', $data);

        // return $datatables->addScope(new NewOrder)->render('bungadavi.orders.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize("create order");
        $data = [
            'title'         => 'Order Transaction Management',
            'subtitle'      => 'Order List',
            'description'   => 'For Management Order Transaction',
            'breadcrumb'    => ['Order Transaction Management', 'Product List'],
            'button'        => ['name' => 'Add Order', 'link' => 'bungadavi.orders.create'],
            'products'          => (new ProductDataTable())->html()->minifiedAjax(route('bungadavi.products.ajax')),
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
                    $codeOrderTransaction = $codeOrderTransaction . date('ym') . str_pad(mt_rand(1, 9999), 4, "0", STR_PAD_LEFT);
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
                "code_currency"                     => $request->order_transaction['currency_id'],
                "rates_currency"                    => $request->order_transaction['rates_currency'],
                "is_guest"                          => $request->order_transaction['is_guest'],
                'from_message_order'                => $product['from_message_order'] ?? "",
                'to_message_order'                  => $product['from_message_order'] ?? "",
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
                    'remarks_product'           => $product['remarks_product'] ?? "",
                ];

                $orderProduct = Product::create($productData);

                if ($product['custom_product']) {

                    foreach ($product['custom_product'] as $key => $custom) {
                        $productCustom = [
                            'list_product_uuid'         => $orderProduct->uuid,
                            'products_material_uuid'    => $custom['products_material_uuid'],
                            'name_stock'                => $custom['name_stock'],
                            'qty_stock'                 => $custom['qty_stock'],
                        ];

                        ProductCustom::create($productCustom);
                    }

                }
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
        $this->authorize("view order");
        $data = Order::findOrFail($id);
        $get_sender = SenderReceiver::where('order_transactions_uuid', $data->uuid)->first();
        $get_list_product = Product::where('order_transactions_uuid', $data->uuid)->first();
        $data_product = ProductStock::findOrFail($get_list_product->product_uuid);
        $get_delivery = Delivery::where('order_transactions_uuid', $data->uuid)->first();
        $get_payment = Payment::where('order_transactions_uuid', $data->uuid)->first();
        $get_province = Province::where('id',$get_sender->receiver_province)->first();
        $get_assign = CourierTask::where('order_transactions_uuid', $data->uuid)->first();
        $get_time_slot = TimeSlot::where('id',$get_delivery->time_slot_id)->first();
        $get_receipt = Receipt::where('order_transactions_uuid', $data->uuid)->first();

        $data = [
            'title'         => 'Customer Florist Management',
            'subtitle'      => 'Form Customer Florist',
            'description'   => 'For Management Customer Florist User',
            'breadcrumb'    => ['Customer Florist Management', 'Form Customer Florist'],
            'guard'         => auth()->user()->group,
            'data'          => $data,
            'sender'        => $get_sender,
            'data_product'  => $data_product,
            'list_product'  => $get_list_product,
            'delivery'      => $get_delivery,
            'payment'       => $get_payment,
            'province'      => $get_province,
            'assign'        => $get_assign,
            'time_slot'     => $get_time_slot,
            'receipt'        => $get_receipt,
        ];

        return view('bungadavi.orders.show', $data);
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
        $order->status_order_transaction = "NEEDED CONFIRMATION";
        $order->florist_uuid = $request->florist_uuid;
        return response()->json($order->save());
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::find($id);

        if ($request->status == "Reject Florist") {
            $order->status_order_transaction = $request->status;
            $order->florist_uuid = NULL;

            return response()->json($order->save());
        }

        $order->status_order_transaction = $request->status;
        return response()->json($order->save());
    }

    public function realTimeOrder()
    {
        // get product order today process
        $today         = Carbon::now()->format('Y-m-d');
        $scheduleToday = Schedule::whereDate('delivery_date', $today)->with('order.products');
        $productToday  = Product::whereIn('order_transactions_uuid', $scheduleToday->pluck('order_transactions_uuid'))->where('status_progress_product', '!=', 'done');

        // get product order tomorrow process
        $tomorrow = Carbon::now()->add(1, 'day')->format('Y-m-d');
        $scheduleTomorrow = Schedule::whereDate('delivery_date', $tomorrow)->with('order.products');
        $productTomorrow  = Product::whereIn('order_transactions_uuid', $scheduleTomorrow->pluck('order_transactions_uuid'))->where('status_progress_product', '!=', 'done');

        $data = [
            'title'         => 'Real Time Order',
            'subtitle'      => 'Real Time Order List',
            'description'   => 'For List Real Time Order',
            'breadcrumb'    => ['Real Time Order Management', 'Order List'],
            'button'        => ['name' => 'Add Order', 'link' => 'bungadavi.orders.create'],
            'data'          => [
                'link'          => route('bungadavi.orders.status_product'),
                'orderToday'    => $productToday->with('product')->orderBy('name_product', 'asc')->get()->toArray(),
                'orderTomorrow' => $productTomorrow->with('product')->with('product.materials')->orderBy('name_product', 'asc')->get()->toArray()
            ]
        ];

        return view('bungadavi.orders.realtime_order', $data);

    }

    public function productStatusOrder(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->status_progress_product = $request->status_product;
        $product->save();

        $productCount = Product::where('order_transactions_uuid', $product->order_transactions_uuid)->where('status_progress_product', '!=', 'done')->count();

        if ($productCount == 0) {
            $order = Order::findOrFail($product->order_transactions_uuid);
            $order->status_order_transaction = "Ready To Pickup";
            $order->save();
        }

        // get stock pada custom product

        // update table stock

        return response()->json(['message' => 'ok']);
    }

    public function deliveredList(DeliveredOrderDataTable $datatables)
    {
        $data = [
            'title'         => 'Order Transaction Management',
            'subtitle'      => 'Order List',
            'description'   => 'For Management Order Transaction',
            'breadcrumb'    => ['Order Transaction Management', 'Product List'],
            'button'        => ['name' => 'Add Order', 'link' => 'bungadavi.orders.create'],
            'linkUpdateStatus'  => (auth()->user()->hasRole('bungadavi') ? url('bungadavi/transaction') : url('affiliate/transaction')),
        ];

        return $datatables->render('commons.datatable', $data);
    }

    public function cancelList(CancelOrderDataTable $datatables)
    {
        $data = [
            'title'         => 'Order Transaction Management',
            'subtitle'      => 'Order List',
            'description'   => 'For Management Order Transaction',
            'breadcrumb'    => ['Order Transaction Management', 'Product List'],
            'button'        => ['name' => 'Add Order', 'link' => 'bungadavi.orders.create'],
            'linkUpdateStatus'  => (auth()->user()->hasRole('bungadavi') ? url('bungadavi/transaction') : url('affiliate/transaction')),
        ];

        return $datatables->render('commons.datatable', $data);
    }

    public function statusDelivered(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status_order_transaction = $request->status;
        $order->save();

        if ($request->ajax()) {
            return response()->json(['status' => true]);
        }

        return redirect()->back()->with('info', 'Order has been delivered');
    }

    public function printOrder()
    {

    }

    public function printDeliveryOrder()
    {
        $order = Order::findOrFail("194f6216-9e56-4410-9a8b-c4127a2007f9");
        $logo = "";
        $data = ['logo' => $logo,'order' => $order];

        $pdf = App::make('dompdf.wrapper');
        $pdf->setPaper(array(0,0, 609, 382));
        $pdf->setWarnings(false);
        $pdf->loadView('bungadavi.orders.print_do', $data);
        return $pdf->stream();
    }

    public function printCardMessage($id)
    {
        $productUuid  = $id;
        $productOrder = Product::where('product_uuid', $productUuid)->first()->order()->first();

        $product     = ProductStock::findOrFail($productUuid);

        switch ($product->printcmmode_product) {
            case '0':
                $data = [ 'align' => 'center', 'position' => '90%', 'product' => $productOrder];

                $pdf = App::make('dompdf.wrapper');
                $pdf->setPaper('A5', 'Potrait');
                $pdf->setWarnings(false);
                $pdf->loadView('bungadavi.orders.print_card_message', $data);
                return $pdf->stream();
                break;

            case '1':
                $data = [ 'align' => 'center', 'position' => '50%', 'product' => $productOrder];

                $pdf = App::make('dompdf.wrapper');
                $pdf->setPaper('A5', 'Potrait');
                $pdf->setWarnings(false);
                $pdf->loadView('bungadavi.orders.print_card_message', $data);
                return $pdf->stream();
                break;

            default:
                $data = [ 'align' => 'center', 'position' => '50%', 'product' => $productOrder];

                $pdf = App::make('dompdf.wrapper');
                $pdf->setPaper('a4', 'landscape');
                $pdf->setWarnings(false);
                $pdf->loadView('bungadavi.orders.print_card_message', $data);
                return $pdf->stream();
                break;
        }


    }
}
