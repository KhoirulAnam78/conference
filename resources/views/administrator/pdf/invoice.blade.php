@php
    use App\Models\GlobalSetting;

    $data = GlobalSetting::where('name', 'kop')->first();
    $kop = '';
    if ($data) {
        $kop = $data->value;
    }
    $data = GlobalSetting::where('name', 'stempel')->first();
    $stempel = '';
    if ($data) {
        $stempel = $data->value;
    }
    $data = GlobalSetting::where('name', 'ttd_invoice')->first();
    $ttd_invoice = '';
    if ($data) {
        $ttd_invoice = $data->value;
    }
    $data = GlobalSetting::where('name', 'image_ttd_invoice')->first();
    $image_ttd_invoice = '';
    if ($data) {
        $image_ttd_invoice = $data->value;
    }
    $data = GlobalSetting::where('name', 'title')->first();
    $title = '';
    if ($data) {
        $title = $data->value;
    }
    $data = GlobalSetting::where('name', 'abbreviation')->first();
    $abbreviation = '';
    if ($data) {
        $abbreviation = $data->value;
    }

    $data = GlobalSetting::where('name', 'start_date_conference')->first();
    $start_date_conference = '';
    if ($data) {
        $start_date_conference = $data->value;
    }
    $data = GlobalSetting::where('name', 'end_date_conference')->first();
    $end_date_conference = '';
    if ($data) {
        $end_date_conference = $data->value;
    }
    $data = GlobalSetting::where('name', 'conference_location')->first();
    $conference_location = '';
    if ($data) {
        $conference_location = $data->value;
    }
@endphp
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">


    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ url('') }}/assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/style.css" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Invoice</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center" style="margin:0px 5px">
            {!! $kop !!}
        </div>
        <div class="row justify-content-center">
            <div class="row justify-content-center"style="width:100%" style="margin:0px 5px">
                <h2 style="text-align: center">INVOICE</h2>
                <table style="width:100%; border-spacing:10px; font-size:16px !important">
                    <tr>
                        <td style="width: 20%; font-weight:bold; ">
                            Bill for
                        </td>
                        <td style="width: 20%; font-weight:bold;">Issued Date</td>
                        <td style="width: 40%; font-weight:bold;">Total bill</td>
                        <td style="width: 20%;font-weight:bold;"></td>
                    </tr>
                    <tr>
                        <td>Khoirul Anam</td>
                        <td>{{ date('d F Y') }}</td>
                        <td>IDR 500000</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="width: 20%; font-weight:bold;">
                            Recipient's name
                        </td>
                        <td style="width: 20%; font-weight:bold;">Payment method</td>
                        <td style="width: 20%; font-weight:bold;">Product Name</td>
                        <td style="width: 20%; font-weight:bold;">Category Product</td>
                    </tr>
                    <tr>
                        <td>Perkumpulan Indonesian Chemical Society</td>
                        <td>Bank BNI</td>
                        <td>The 11st International Conference of the Indonesian Chemical Society (ICICS 2023)</td>
                        <td>Seminar</td>
                    </tr>
                </table>
                <table style="width:100%;border-collapse: collapse; border-spacing:10px !important;">
                    {{-- <tr>
                                <td colspan="8">
                                    <hr>
                                </td>
                            </tr> --}}
                    <tr style="border-top:1px solid black;">
                        <td style="font-weight:bold; padding:5px">No</td>
                        <td style="font-weight:bold; padding:5px">Packet Name</td>
                        <td style="font-weight:bold; padding:5px">Fee</td>
                        <td style="font-weight:bold;padding:5px">Amount</td>
                        <td style="font-weight:bold;padding:5px">Subtotal</td>
                        <td style="font-weight:bold;padding:5px">Virtual Account</td>
                        <td style="font-weight:bold;padding:5px">Payment Start Date</td>
                        <td style="font-weight:bold;padding:5px">Payment End Date</td>
                    </tr>
                    <tr style="border-top:1px solid black; border-bottom:1px solid black; pading:3px">
                        <td style="padding:5px">1</td>
                        <td style="padding:5px">General Speaker</td>
                        <td style="padding:5px">IDR 500000</td>
                        <td style="padding:5px">1</td>
                        <td style="padding:5px">IDR 500000</td>
                        <td style="padding:5px">698124931</td>
                        <td style="padding:5px">{{ date('d F Y') }}</td>
                        <td style="padding:5px">10 November 2023</td>
                    </tr>
                    <tr>
                        <td colspan="8" style="padding-top:20px" align="center">
                            <strong>
                                Total Bill : IDR 500000
                            </strong>
                        </td>
                    </tr>
                </table>
                <table style="width:100%">
                    <tr>
                        <td width="70%"></td>
                        <td width="30%">
                            <p style="margin:50px 0px 0px 0px; padding:0px;font-size: 14px; text-align:end">
                                {{ date('d F Y') }} <br>
                                Signature of Receiver<br>
                            </p>
                            <div class="parent">
                                <div class="parent" style="position: relative;top: 10px;left: 0;">
                                    <img class="image1" style="position: relative;top: 0;left: 150px;"
                                        src="{{ url('assets/img/stempel-removebg-preview.png') }}" width="100px" />
                                    <img class="image2" style="position: absolute;right: 20px;"
                                        src="{{ url('assets/img/ttd_receipt-removebg-preview.png') }}"
                                        width="100px" />
                                </div>
                            </div>
                            <p style="margin:10px 0px 0px 0px; padding:0px;font-size: 14px; text-align:end">
                                Restina Bemis, S.Si., M.Si.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Paid : IDR 500000</strong></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
