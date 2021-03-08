<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Job application received</title>

    <style type="text/css">
        * {
            -ms-text-size-adjust: none;
            -webkit-text-size-adjust: none;
        }
        /* CLIENT-SPECIFIC STYLES */
        body, table, td, a {-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
        table, td {mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */

        /* RESET STYLES */
        img {border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
        table {border-collapse: collapse !important;}
        body {height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }
    </style>
</head>
<body style="font-family: Roboto, sans-serif; font-size: 11.5pt;">
    <p>
        You have received an email from Paynters.com.au, the information as submitted is below:
    </p>

    <table style="min-width: 500px">
        <tr>
            <td>Name</td>
            <td>
                {{ $name }}
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
                {{ $email }}
            </td>
        </tr>
        <tr>
            <td>Phone</td>
            <td>{{ $phone }}</td>
        </tr>
        <tr>
            <td>Message</td>
            <td>{{ $text }}</td>
        </tr>
    </table>
</body>
</html>
