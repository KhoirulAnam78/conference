@php
    use App\Models\GlobalSetting;
    use App\Models\ImportantDates;
    use Carbon\Carbon;

    $data = GlobalSetting::where('name', 'kop')->first();
    $kop = '';
    if ($data) {
        $dom = new \domdocument();
        $dom->loadHtml($data->value, LIBXML_NOWARNING | LIBXML_NOERROR);

        //identify img element
        $images = $dom->getelementsbytagname('img');

        foreach ($images as $img) {
            $data = $img->getattribute('src');
            $context = stream_context_create([
                'http' => [
                    'header' =>
                        'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36',
                ],
            ]);
            $path2 = 'data:image/png;base64,' . base64_encode(file_get_contents($data, false, $context));
            $img->removeattribute('src');
            $img->setattribute('src', $path2);
        }
        $kop = $dom->saveHtml();
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

    $recipient = GlobalSetting::where('name', 'recipient')->first();
    $recipient = $recipient->value ?? null;
    $payment_number = GlobalSetting::where('name', 'payment_number')->first();
    $payment_number = $payment_number->value ?? null;
    $bank_name = GlobalSetting::where('name', 'bank_name')->first();
    $bank_name = $bank_name->value ?? null;

    $paymentDeadline = ImportantDates::where('name', 'like', '%payment%')->first();
    $date = $paymentDeadline->start_date ?? null;
    if ($paymentDeadline) {
        $date = $paymentDeadline->end_date ?? $paymentDeadline->start_date;
    }

    $date_payment = '';
    if ($date) {
        $date_payment = Carbon::parse($date);
    }
    $date_payment = $date_payment->format('d F Y');

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
    <style>
        @media print {
            @page {
                size: landscape
            }
        }

        @media print {
            body {
                height: 21cm;
                width: 29.7cm;
                /* change the margins as you want them to be. */
            }
        }
    </style>
    <title>Invoice</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center h-100" style="width: 100% !important">
            <div class="col-12 h-100" style="width: 100% !important">
                {!! $kop !!}
            </div>
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
                        <td>{{ $full_name }}</td>
                        <td>{{ date('d F Y') }}</td>
                        <td>IDR {{ $fee }}</td>
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
                        <td>{{ $recipient }}</td>
                        <td>{{ $bank_name }}</td>
                        <td>{{ $title . ' (' . $abbreviation . ')' }}</td>
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
                        <td style="padding:5px">{{ $participant_type }}</td>
                        <td style="padding:5px">IDR {{ $fee }}</td>
                        <td style="padding:5px">1</td>
                        <td style="padding:5px">IDR {{ $fee }}</td>
                        <td style="padding:5px">{{ $payment_number }}</td>
                        <td style="padding:5px">{{ date('d F Y') }}</td>
                        <td style="padding:5px">{{ $date_payment }}</td>
                    </tr>
                    <tr>
                        <td colspan="8" style="padding-top:20px" align="center">
                            <strong>
                                Total Bill : IDR {{ $fee }}
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
                            <div class="parent" style="text-align: end">
                                <div class="parent" style="position: relative;top: 10px;left: 0;">
                                    @if ($stempel)
                                        <img class="image1" style="position: relative;top: 0;left: 70px;"
                                            src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/storage/' . $stempel))) }}"
                                            alt="stempel" width="100px" />
                                    @else
                                        <div class="image1" style="position: relative;top: 0;right: 70px;"
                                            alt="stempel" width="100px"> </div>
                                    @endif
                                    <img class="image2" style="position: absolute; right: 100px;"
                                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/storage/' . $image_ttd_invoice))) }}"
                                        {{-- src="{{ public_path('storage/' . $image_ttd_loa) }}"  --}} width="100px" />
                                </div>
                            </div>
                            <br>
                            <br>
                            <p style="margin:10px 0px 0px 0px; padding:0px;font-size: 14px; text-align:end">
                                {{ $ttd_invoice }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Paid : IDR {{ $fee }}</strong></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
