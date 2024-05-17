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
    $data = GlobalSetting::where('name', 'ttd_receipt')->first();
    $ttd_receipt = '';
    if ($data) {
        $ttd_receipt = $data->value;
    }
    $data = GlobalSetting::where('name', 'image_ttd_receipt')->first();
    $image_ttd_receipt = '';
    if ($data) {
        $image_ttd_receipt = $data->value;
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
    <title>Receipt</title>
</head>

<body>
    <div class="row justify-content-center">
        <div style="width:100%">
            <div class="row justify-content-center" style="margin:0px 5px">
                {!! $kop !!}
                <h4 style="text-align: center">RECEIPT</h4>
                <table style="width:100%">
                    <tr>
                        <td>
                            No
                        </td>
                        <td>: {{ $receipt_no }}</td>
                    </tr>
                    <tr>
                        <td>Received From</td>
                        <td>: {{ $full_name }}</td>
                    </tr>
                    <tr>
                        <td>
                            Amount Paid
                        </td>
                        <td>
                            : {{ $fee }}
                        </td>
                    </tr>
                    <tr>
                        <td>For the Payment of</td>
                        <td>: {{ $payment_for }}</td>
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
                                    <img class="image2" style="position: absolute; right: 70px;"
                                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/storage/' . $image_ttd_receipt))) }}"
                                        {{-- src="{{ public_path('storage/' . $image_ttd_receipt) }}"  --}} width="100px" />
                                </div>
                            </div>
                            <br>
                            <br>
                            <p style="margin:10px 0px 0px 0px; padding:0px;font-size: 14px; text-align:end">
                                {{ $ttd_receipt }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Paid : {{ $fee }}</strong></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
</body>

</html>
