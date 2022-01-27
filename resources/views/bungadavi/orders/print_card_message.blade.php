<style>
    .centered {
        position: fixed;
        top: {{ $position }};
        left: 50%;
        /* bring your own prefixes */
        transform: translate(-50%, -50%);
    }

    .footer {
        position: fixed;
        top: 100%;
        left: 20px;
        /* bring your own prefixes */
        transform: translate(-50%, -50%);
        font-size: 0.6em;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        color: #afafaf;
    }

    .text-style {
        font-size: 1.2em;
        font-weight: bold;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
    }
</style>

<div class="centered">
    <p class="text-style">
        {{ Str::upper($product->from_message_order) }}
    </p>
    <p class="text-style">
        {{ Str::upper($product->to_message_order) }}
    </p>
</div>

<div class="footer">
    <p>{{$product->code_order_transaction}}</p>
</div>
