@extends("main.admin")
@section("content")
    <button type="button" id="btn-print"
            class="btn-print btn btn-default btn-block">Çap<i
                class="icon-printer"></i></button>
    <div id="printarea" class="block-table">
        <table>
            <tr>
                <td>Charge collect</td>
                <td><input checked type="checkbox" value="1"/></td>
                <td>Pre-Paid</td>
                <td><input type="checkbox" value="1"/></td>
            </tr>
            <tr>
                <td class="bold-td" colspan="4">Shipping</td>
            </tr>
            <tr>
                <td>Name:</td>
                <td colspan="3">{{ $order->product_company??'' }}</td>
            </tr>
            <tr>
                <td>Address:</td>
                <td colspan="3">{{ $order->product_company_address??'' }}</td>
            </tr>
            <tr>
                <td colspan="4" class="bold-td">Consignee</td>
            </tr>
            <tr>
                <td class="bold-td">Country:</td>
                <td>Azerbaijan</td>
                <td>Postcode:</td>
                <td>5641</td>
            </tr>
            <tr>
                <td class="bold-td">Name:</td>
                <td>{{ $order->customer ? $order->customer->first_name . ' ' . $order->customer->last_name : '' }}</td>
                <td class="bold-td">Personal id:</td>
                <td>{{ $order->customer ? $order->customer->passport_fin : '' }}</td>
            </tr>
            <tr>
                <td class="bold-td">Address:</td>
                <td colspan="3">{{ $order->customer ? $order->customer->address : '' }}</td>
            </tr>
            <tr>
                <td class="bold-td">Email/phone:</td>
                <td colspan="3">{{ $order->customer ? $order->customer->email . '/' .$order->customer->phone  : '' }}</td>
            </tr>
            <tr>
                <td class="bold-td">Reference number:</td>
                <td colspan="3">{{ $order->tracking_code??'' }}</td>
            </tr>
            <tr>
                <td colspan="4" class="bold-td">Shipment details</td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td>Weigth (kq)</td>
                <td>Dimension (sm)<br/>length/width/height</td>
                <td>Chargeable weight</td>
            </tr>
            <tr>
                <td>{{ $order->quantity??'' }}</td>
                <td>{{ $order->weigth??'' }}</td>
                <td>{{ $order->length??'' .'/' .$order->width??'' .'/'.$order->depth??'' }}</td>
                <td>{{ $order->chargeable_weigth??'' }}</td>
            </tr>
            <tr>
                <td>Transportation mode:</td>
                <td>By air <input checked type="checkbox" value="1"/></td>
                <td>By sea <input type="checkbox" value="1"/></td>
                <td>M-M <input type="checkbox" value="1"/></td>
            </tr>
            <tr>
                <td colspan="4" class="bold-td">Declaired value for Customs</td>
            </tr>
            <tr>
                <td>Product price:</td>
                <td>{{ $order->product_price??'' }}</td>
                <td colspan="2">{{ $order->product_price??'' }}</td>
            </tr>
            <tr>
                <td>Shipping plan:</td>
                <td>{{ $order->delivery_price??'' }}</td>
                <td>Total:</td>
                <td>{{ $order->total_price??'' }}</td>
            </tr>
            <tr>
                <td>Category:</td>
                <td colspan="3">{{ $order->product_name??'' }}</td>
            </tr>
        </table>
    </div>
@endsection

@section("css")
    <style>
        .btn-print {
            margin-bottom: 20px;
        }

        .block-table {
            margin: 0 auto;
            width: 600px;
            margin-bottom: 30px;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            text-align: left;
            padding: 8px;
        }

        table, tr {
            border: 2px solid #000;
        }

        .bold-td {
            font-weight: bold;
        }
    </style>
@endsection
@section("js")

    <script>
        $(function () {
            $("#btn-print").on('click', function () {

                $("#printarea").print({

// Use Global styles
                    globalStyles: true,

// Add link with attrbute media=print
                    mediaPrint: true,

//Custom stylesheet
                    stylesheet: "http://fonts.googleapis.com/css?family=Inconsolata",

//Print in a hidden iframe
                    iframe: false,

// Don't print this
                    noPrintSelector: ".no-print",

// Manually add form values
                    manuallyCopyFormValues: true,

// resolves after print and restructure the code for better maintainability
                    deferred: $.Deferred(),

// timeout
                    timeout: 250,

// Custom title
                    title: null,

// Custom document type
                    doctype: '<!doctype html>'

                });
            });
        });

    </script>

@endsection

