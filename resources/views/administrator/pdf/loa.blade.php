@php
    use App\Models\GlobalSetting;

    $data = GlobalSetting::where('name', 'kop')->first();
    $kop = '';
    if ($data) {
        $kop = $data->value;
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
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <title>Letter Of Acceptance</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center" style="margin:0px 5px">
            {!! $kop !!}
        </div>
        <div class="row">
            <hr style="background-color:black; height:2px">
        </div>

        <div class="row">
            <p style="font-size: 14px">Dear : <br>
                <strong>Khoirul Anam</strong> <br>
                <strong>Universitas Jambi</strong>
            </p>
        </div>
        <div class="row">
            <p style="margin:10px 0px 0px 0px; padding:0px;font-size: 14px">Thank you for your interest in
                <strong>The 11st
                    International Conference of the Indonesian Chemical Society (ICICS 2023)</strong> and submitting
                your Abstract entitled:
            </p>

            <p style="margin:20px 0px 0px 0px; padding:0px;font-size: 14px; text-align:center">
                <strong>Judul abstract</strong>
            </p>

            <p style="margin:20px 0px 0px 0px; padding:0px;font-size: 14px">It is our pleasure to inform you that
                your paper
                based on your Extended Abstract has been accepted for
                presentation at the conference, which will be taking place at Jambi on 13-14 November 2024.
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
                        Chairman of ICICS 2023 <br>
                    </p>
                    <div class="parent" style="text-align: end">
                        <div class="parent" style="position: relative;top: 10px;left: 0;">
                            <img class="image1" style="position: relative;top: 0;right: 70px;"
                                src="{{ url('assets/img/stempel-removebg-preview.png') }}" width="100px" />
                            <img class="image2" style="position: absolute; right: 20px;"
                                src="{{ url('assets/img/ttd_chairman-removebg-preview.png') }}" width="100px" />
                        </div>
                    </div>
                    <p style="margin:10px 0px 0px 0px; padding:0px;font-size: 14px; text-align:end">
                        Dr. Madyawati Latief, S.P., M,Si.
                    </p>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>
