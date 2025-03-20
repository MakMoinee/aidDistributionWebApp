<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Donation</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f9f9f9;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .certificate {
            width: 800px;
            padding: 40px;
            text-align: center;
            border: 10px solid #d4af37;
            background: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }
        .certificate h1 {
            font-size: 40px;
            color: #d4af37;
            margin-bottom: 10px;
        }
        .certificate p {
            font-size: 18px;
            color: #333;
        }
        .donor-name {
            font-size: 30px;
            font-weight: bold;
            color: #2c3e50;
            margin: 20px 0;
        }
        .details {
            font-size: 20px;
            color: #555;
            margin: 20px 0;
        }
        .signature {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
        }
        .signature div {
            text-align: center;
        }
        .signature p {
            border-top: 1px solid #333;
            display: inline-block;
            padding-top: 5px;
            font-size: 16px;
            color: #333;
        }
        .download-btn {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background: #d4af37;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="certificate" id="certificate">
        <h1>Certificate of Donation</h1>
        <p>This certificate is proudly presented to</p>
        <div class="donor-name">{{ $data['firstName'] }} {{ $data['middleName'] }} {{ $data['lastName'] }}</div>
        <p>In recognition of their generous contribution to</p>
        <p>Donation Amount: <strong>PHP{{ number_format($amount, 2) }}</strong></p>
        <p>Your generosity helps us make a difference. Thank you!</p>
        
        <div class="signature">
            <div>
                <img style="float: left; position: absolute" src="/signature.png" alt="" srcset=""
                    height="50px" width="180px">
                <p>Authorized Representative</p>
            </div>
            <div>
                <h3>
                    Date Issued:
                    <b>{{ (new DateTime($data['created_at']))->setTimezone(new DateTimeZone('Asia/Manila'))->format('Y-m-d h:i A') }}</b>
                </h3>

            </div>
        </div>
    </div>
    <button class="download-btn" onclick="downloadCertificate()">Download as Image</button>

    <script>
        function downloadCertificate() {
            const certificate = document.getElementById("certificate");
            html2canvas(certificate).then(canvas => {
                let link = document.createElement("a");
                link.href = canvas.toDataURL("image/png");
                link.download = "Certificate_of_Donation.png";
                link.click();
            });
        }
    </script>
</body>
</html>
