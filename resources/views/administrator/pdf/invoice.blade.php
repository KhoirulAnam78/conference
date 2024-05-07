<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>Invoice</title>
</head>

<body>
    <div class="row justify-content-center">
        <div style="width:100%">
            <div class="row justify-content-center"style="width:100%" style="margin:0px 5px">
                <table style="width:100%">
                    <tr style="margin:0; padding:0">
                        <td style="width:20%">
                            <img src="{{ url('assets/img/unja-3d.jpeg') }}" width="100px" alt="">
                        </td>
                        <td style="width:80%">
                            <h4 style="text-align: center; font-size:18px; margin:0; padding:0">
                                The 11st International Conference of the Indonesian Chemical Society <br>(ICICS 2023)
                            </h4>
                            <h6 style="text-align: center; font-size:16px; margin:0; padding:0">
                                DEPARTMENT OF CHEMISTRY <br>
                                FACULTY OF SCIENCE AND
                                TECHNOLOGY <br>
                                UNIVERSITAS JAMBI</h6>
                            <p style="text-align: center; font-size:14px; margin:0; padding:0">
                                Email : icics2023@unja.ac.id; Website : https://icics2023.unja.ac.id
                            </p>
                        </td>
                        <td style="width:15%">
                            <img src="{{ url('assets/img/logo-fix.png') }}" width="150px" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <hr style="height:2px; background-color:black">
                        </td>
                    </tr>
                </table>
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
                        <td>{{ $full_name }} <br> {{ $email }}</td>
                        <td>{{ date('d F Y') }}</td>
                        <td>{{ $fee }}</td>
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
                        <td style="padding:5px">{{ $participant_type }}</td>
                        <td style="padding:5px">{{ $fee }}</td>
                        <td style="padding:5px">1</td>
                        <td style="padding:5px">{{ $fee }}</td>
                        <td style="padding:5px">698124931</td>
                        <td style="padding:5px">{{ date('d F Y') }}</td>
                        <td style="padding:5px">10 November 2023</td>
                    </tr>
                    <tr>
                        <td colspan="8" style="padding-top:20px" align="center">
                            <strong>
                                Total Bill : {{ $fee }}
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
                                    <img class="image1" style="position: relative;top: 0;left: 0;"
                                        src="{{ url('assets/img/stempel-removebg-preview.png') }}" width="100px" />
                                    <img class="image2" style="position: absolute;left: 70px;"
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
                        <td><strong>Paid : {{ $fee }}</strong></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
</body>

</html>
