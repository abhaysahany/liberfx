<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KYC Rejection Mail</title>
    <style>
        img {
            display: block;
        }

        .myText {
            font-size: 18px;
            padding-top: 50%;
            padding-bottom: 130px;
            padding-right: 8%;
            color: #1E3F77;
            width: 45%;
        }

        .mainCell {

            color: black;
            box-sizing: border-box;
            background-image: url('https://liberfx.com/uassets/images/temp/kycRejectOld.jpg');
            background-size: 100% 100%;
            height: 680px;
            background-position: top center;
            background-repeat: no-repeat;
            padding: 20px;
            margin-left: 200px;
            margin-right: 200px;
        }

        .tdCell {
            width: 25%;
        }

        @media only screen and (max-width: 768px) {
            .tdCell {
                width: 0px;
            }

            .myText {
                font-size: 15px;
                width: 50%;
                color: #1E3F77;
                padding-right: 2%;
                padding-top: 70%;
                padding-bottom: 130px;
            }
        }
    </style>
</head>

<body>
    <div style="width:100%; height:100%;">

        <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="width:100%; height:100%;">

            <tr>
                <td class="tdCell"></td>
                <td class="mainCell">
                    <p class="myText" style="padding-left:0%;margin-top:0px;float:inline-end">
                        <span class="myText"
                            style="padding-left:0%;font-size:25px;font-weight:bold;padding-bottom:20px">
                            {{ $smsg }}
                        </span>
                        <br><br>
                        {{ $kycmessage }}
                    </p>

                </td>
                <td class="tdCell"></td>
            </tr>
        </table>

    </div>
</body>

</html>
