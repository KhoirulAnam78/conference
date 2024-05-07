<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>Letter Of Acceptance</title>
</head>

<body>
    <div class="row justify-content-center">
        <div style="width:100%">
            <div class="row justify-content-center" style="margin:0px 5px">
                <table>
                    <tr style="margin:0; padding:0">
                        <td style="width:20%">
                            <img src="{{ url('') }}/assets/img/unja-3d.jpeg" width="100px" alt="">
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

                    <tr>
                        <td colspan="2"></td>
                        <td>
                            <p style="text-align: end; font-size:14px">{{ date('d F Y') }}</p>
                        </td>
                    </tr>
                </table>
                <p style="margin:0px; padding:0px;font-size: 14px">Dear :</p>
                <div class="div" style="margin:0px; padding:0px; width:200px;font-size: 14px">
                    <strong>{{ $full_name }}</strong> <br>
                    <strong>{{ $institution }}</strong>
                </div>
                <br>
                <br>
                <p style="margin:10px 0px 0px 0px; padding:0px;font-size: 14px">Thank you for your interest in
                    <strong>The 11st
                        International Conference of the Indonesian Chemical Society (ICICS 2023)</strong> and submitting
                    your Abstract entitled:
                </p>

                <p style="margin:20px 0px 0px 0px; padding:0px;font-size: 14px; text-align:center">
                    <strong>{{ $abstractTitle }}</strong>
                </p>

                <p style="margin:20px 0px 0px 0px; padding:0px;font-size: 14px">It is our pleasure to inform you that
                    your paper
                    based on your Extended Abstract has been accepted for
                    presentation at the conference, which will be taking place at Jambi on 14-16 November 2023.
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
                        <div class="parent">
                            <div class="parent" style="position: relative;top: 10px;left: 0;">
                                <img class="image1" style="position: relative;top: 0;left: 0;"
                                    src="{{ url('assets/img/stempel-removebg-preview.png') }}" width="100px" />
                                <img class="image2" style="position: absolute;left: 70px;"
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
    </div>
</body>

</html>
