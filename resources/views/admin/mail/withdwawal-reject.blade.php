<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Withdrawal Mail</title>
    <style>
        img {
            display: block;
        }

        .myText {
            font-size: 18px;
            padding-top: 120px;
            padding-left: 0px;
            margin-left: 0px;
            /* padding-bottom: 60px; */
            color: rgba(13, 13, 68, 0.952);
            width: 80%;
        }

        .mainCell {

            color: rgba(13, 13, 68, 0.952);
            box-sizing: border-box;
            background-image: url('https://liberfx.com/uassets/images/temp/wdCancel.jpg');
            background-size: 100% 100%;
            height: 680px;
            background-position: top center;
            background-repeat: no-repeat;
            /* padding: 20px; */
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
                width: 80%;
                color: rgba(13, 13, 68, 0.952);
                padding-left: 0px;
                padding-top: 80px;
                margin-left: 0px;
                /* padding-bottom: 60px; */
                /* padding-right: 4%; */
                /* padding-top: 100px; */
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
                    <p class="myText" style="padding-left:7%; padding-right:10%;">
                        Welcome {{ $name }},
                        <br><br>
                        Your withdrawal request on Dated - {{ date('d-m-Y', strtotime($date)) }} by request id no.
                        {{ $request_id }} for the gross amount - {{ $gross . ' ' . $coin }} has been rejected. and
                        amount has been
                        added
                        back to your trade wallet. Details are as follows.
                    <table class="table" style="padding-left:7%;padding-top:0px;margin-top:0px">
                        <tr>
                            <th>Coin</th>
                            <td>{{ $coin }}</td>
                        </tr>

                        <tr>
                            <th>Gross Amount</th>
                            <td>{{ $gross }}</td>
                        </tr>
                        <tr>
                            <th>Service Charge</th>
                            <td>{{ $service }}</td>
                        </tr>
                        <tr>
                            <th>Net Amount</th>
                            <td>{{ $net }}</td>
                        </tr>
                        <tr>
                            <th>Pay Wallet</th>
                            <td>{{ $wallet }}</td>
                        </tr>
                        <tr>
                            <th>Cancelled Reason</th>
                            <td>{{ $reason }}</td>
                        </tr>
                    </table>
                    <br>
                    <span style="padding-left:7%;font-size:16px">
                        With Regard
                    </span>
                    <br>
                    <span style="padding-left:7%;font-size:16px">
                        Team Liberfx
                    </span>
                    </p>



                </td>
                <td class="tdCell"></td>
            </tr>
        </table>

    </div>
</body>

</html>
