<script>
    function wcqib_refresh_quantity_increments() {
        jQuery("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").each(function(a, b) {
            var c = jQuery(b);
            c.addClass("buttons_added"), c.children().first().before('<input type="button" value="-" class="minus" />'), c.children().last().after('<input type="button" value="+" class="plus" />')
        })
    }
    String.prototype.getDecimals || (String.prototype.getDecimals = function() {
        var a = this,
            b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
        return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0
    }), jQuery(document).ready(function() {
        wcqib_refresh_quantity_increments()
    }), jQuery(document).on("updated_wc_div", function() {
        wcqib_refresh_quantity_increments()
    }), jQuery(document).on("click", ".plus, .minus", function() {
        var a = jQuery(this).closest(".quantity").find(".qty"),
            b = parseFloat(a.val()),
            c = parseFloat(a.attr("max")),
            d = parseFloat(a.attr("min")),
            e = a.attr("step");
        b && "" !== b && "NaN" !== b || (b = 0), "" !== c && "NaN" !== c || (c = ""), "" !== d && "NaN" !== d || (d = 0), "any" !== e && "" !== e && void 0 !== e && "NaN" !== parseFloat(e) || (e = 1), jQuery(this).is(".plus") ? c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals())) : d && b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())), a.trigger("change")
    });
    $(document).ready(function() {
        // $('.clientData').select2({
        //     theme:'bootstrap5'
        // });
        $('input[type=radio][name=radioButtonClientType]').change(function() {
            if (this.value == 'clientPersonal') {
                $('#picData').remove()
                $('#additionalForm').remove()
                $('#rowClient').after(`
                    <div id="additionalForm" class="col md-4">
                          <p>PO Reference</p>
                          <input text="" id="poReference" class="col md-4"></text>
                          <br>
                          <br>
                    </div>
                `)
            } else if (this.value == 'clientCorporate') {
                $('#poReference').after(`
                    <br>
                    <p>PIC</p>
                    <select id="picData" class="col md-4">
                        <option value="AL">Alabama</option>
                        <option value="WY">Wyoming</option>
                    </select>
                `)

            } else if (this.value == 'clientAffiliate') {
                alert("tampilkan dropdown client affiliate");
            }
        });


        $('#btn1').click(function (){
            let radioButtonCheck = $('input[name=radioButtonClientType]:checked').val()
            if(radioButtonCheck === undefined) {
                return alert('Please select client type first')
            }
            $(this).hide()
                $('#detailOrder').show()
                // $('#rowDetailOrder').after(`
                //    <button id="btn2" class="btn btn-danger" style="width:10%">Next</button>
                // `)
                $('#btn2').hide()

        })

        var table = $('#detailOrderDataTable').DataTable( {
            "columnDefs": [ {
                "targets": -1,
                "data": null,
                "defaultContent": "<button class='btn btn-primary'>Select</button>"
            } ]
        } );
        $('#detailOrderDataTable tbody').on( 'click', 'button', function () {
            var data = table.row( $(this).parents('tr') ).data();
            console.log("DATA : ", data)
            $('#receiptAddressInfoDetail').html(data[3])
            $('#receiptDetail').show();
            $('#btnAddDetailOrder').hide()
            $('#detailDeliveryOrder').show()
            $('#modalSelectProduct').show()

        } );

        var tableProduct = $('#detailProductDataTable').DataTable( {
            "columnDefs": [ {
                "targets": -1,
                "data": null,
                "defaultContent": "<button class='btn btn-primary'>Select</button>"
            } ]
        } );
        $('#detailProductDataTable tbody').on( 'click', 'button', function () {
            var data = tableProduct.row( $(this).parents('tr') ).data();
            console.log("MASUK GA")
            $('#form1').after(`
                <div class="card">
                    <div id="productOrder">
                        <div class="col lg-2">
                            <div id="detailDeliveryOrder">
                                <br>
                                <div class="form-group">
                                    <i class="la leave-box">
                                        <b class="mb-0">Product Details</b>
                                    </i>
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{__('Product Image')}} </label>
                                            <br>
                                            <img src="pic_trulli.jpg" alt="Product Image">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{__('Product Name')}} </label>
                                            <br>
                                            <input type="text" id="productName" class="col-lg-9">
                                        </div>
                                    </div>
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{__('Cost Price')}} </label>
                                            <br>
                                            <input type="text" id="productCostPrice" class="col-lg-9">
                                        </div>
                                    </div>
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{__('Selling Price')}} </label>
                                            <br>
                                            <input type="text" id="productSellingPrice" class="col-lg-9">
                                        </div>
                                    </div>
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{__('Qty')}} </label>
                                            <br>
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus">
                                                <input type="number" id="productQty" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
                                                <input type="button" value="+" class="plus">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{__('From')}} </label>
                                            <br>
                                            <input type="text" id="productFrom" class="col-lg-9">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{__('To')}} </label>
                                            <br>
                                            <input type="text" id="productTo" class="col-lg-9">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">{{__('Message')}} </label>
                                            <br>
                                            <textarea id="productMessage" class="col-lg-12"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            `)

        } );
        $('#productModalAction').click(function(){
            console.log("Yoo")
        })


    });
</script>
