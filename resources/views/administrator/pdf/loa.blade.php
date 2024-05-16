@php
    use App\Models\GlobalSetting;

    $data = GlobalSetting::where('name', 'kop')->first();
    $kop = '';
    if ($data) {
        $dom = new \domdocument();
        $dom->loadHtml($data->value, LIBXML_NOWARNING | LIBXML_NOERROR);

        //identify img element
        $images = $dom->getelementsbytagname('img');

        foreach ($images as $img) {
            $data = $img->getattribute('src');
            $path2 = 'data:image/png;base64,' . base64_encode(file_get_contents($data));
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
    $data = GlobalSetting::where('name', 'ttd_loa')->first();
    $ttd_loa = '';
    if ($data) {
        $ttd_loa = $data->value;
    }
    $data = GlobalSetting::where('name', 'image_ttd_loa')->first();
    $image_ttd_loa = '';
    if ($data) {
        $image_ttd_loa = $data->value;
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
    <meta charset="UTF-8">
    <meta name="description" content="International Conference of the Indonesian Chemical Society
    2023">
    <meta name="keywords" content="icics, icics 2023, icics2023, icics jambi, universitas jambi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700,800,900&display=swap"
        rel="stylesheet">
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
    <title>Letter Of Acceptance</title>
    <style>
        @page {
            size: 7in 9.25in;
            margin: 27mm 16mm 27mm 16mm;
        }

        div.chapter,
        div.appendix {
            page-break-after: always;
        }

        @media print {
            body {
                width: 21cm;
                height: 29.7cm;
                margin: 30mm 45mm 30mm 45mm;
                /* change the margins as you want them to be. */
            }
        }

        table {
            width: 100% !important;
            background-color: red;
        }
    </style>
</head>

<body>
    <div class="container" style="width:100%; margin:0px 5px">
        <div class="row justify-content-center h-100" style="width: 100% !important">
            <div class="col-12 h-100" style="width: 100% !important">
                {!! $kop !!}
            </div>
        </div>

        <div class="row">
            <p style="font-size: 14px">Dear : <br>
                <strong>{{ $full_name }}</strong> <br>
                <strong>{{ $institution }}</strong>
            </p>
        </div>
        <div class="row justify-content-end">
            <p style="font-size: 14px">{{ date('d F Y') }}
            </p>
        </div>
        <div class="row">
            <p style="margin:10px 0px 0px 0px; padding:0px;font-size: 14px">Thank you for your interest in
                <strong>{{ $title }}</strong> and submitting
                your Abstract entitled :
            </p>

            <div class="col-12 text-center">
                <p class="align-items-center">
                    <strong>{{ $abstractTitle }}</strong>
                </p>
            </div>

            @php
                $date = \Carbon\Carbon::create($start_date_conference);
                $startDate = $date->format('d');
                $date = \Carbon\Carbon::create($end_date_conference);
                $endDate = $date->format('d F Y');
            @endphp

            <p style="margin:20px 0px 0px 0px; padding:0px;font-size: 14px">It is our pleasure to inform you that
                your paper
                based on your Extended Abstract has been accepted for
                presentation at the conference, which will be taking place at {{ $conference_location }} on
                {{ $startDate }} -
                {{ $endDate }}.
                We hereby have the honor and pleasure of inviting you to present your paper in the conference.
            </p>
            <p style="margin:20px 0px 0px 0px; padding:0px;font-size: 14px">Please do not hesitate to contact us if
                you need
                further information. <br>
                Looking forward to your participation in this conference.
            </p>
        </div>
        <table style="width:100%">
            <tr>
                <td width="70%"></td>
                <td width="30%">
                    <p style="margin:50px 0px 0px 0px; padding:0px;font-size: 14px; text-align:end">
                        Warm Regards, <br>
                        Chairman of {{ $abbreviation }} <br>
                    </p>
                    <div class="parent" style="text-align: end">
                        <div class="parent" style="position: relative;top: 10px;left: 0;">
                            @if ($stempel)
                                <img class="image1" style="position: relative;top: 0;left: 70px;"
                                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/storage/' . $stempel))) }}"
                                    alt="stempel" width="100px" />
                            @else
                                <div class="image1" style="position: relative;top: 0;right: 70px;" alt="stempel"
                                    width="100px"> </div>
                            @endif
                            <img class="image2" style="position: absolute; right: 70px;"
                                src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/storage/' . $image_ttd_loa))) }}"
                                {{-- src="{{ public_path('storage/' . $image_ttd_loa) }}"  --}} width="100px" />
                        </div>
                    </div>
                    <br>
                    <br>
                    <p style="margin:10px 0px 0px 0px; padding:0px;font-size: 14px; text-align:end">
                        {{ $ttd_loa }}
                    </p>

                </td>
            </tr>
        </table>
    </div>

</body>

</html>
