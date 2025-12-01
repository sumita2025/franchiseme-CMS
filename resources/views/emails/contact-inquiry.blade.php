<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Inquiry - {{ env('APP_NAME') }}</title>
</head>

<body style="margin:0; padding:0; background:#f5f5f5; font-family: Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding: 30px 0;">
        <tr>
            <td align="center">

                <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; padding:25px; box-shadow:0 2px 8px rgba(0,0,0,0.1);">

                    <tr>
                        <td>
                            <h2 style="margin:0 0 20px 0; font-size:22px; color:#333;">
                                New Contact Inquiry - {{ env('APP_NAME') }}
                            </h2>

                            <p style="font-size:16px; color:#444; margin-bottom:10px;">
                                <strong>Name:</strong> {{ $data['name'] }}
                            </p>

                            <p style="font-size:16px; color:#444; margin-bottom:10px;">
                                <strong>Email:</strong> {{ $data['email'] ?? 'Not provided' }}
                            </p>

                            <p style="font-size:16px; color:#444; margin-bottom:10px;">
                                <strong>Phone:</strong> {{ $data['phone'] ?? 'Not provided' }}
                            </p>

                            <p style="font-size:16px; color:#444; margin-bottom:10px;">
                                <strong>Subject:</strong> {{ $data['subject'] ?? 'Not provided' }}
                            </p>

                            <p style="font-size:16px; color:#444; margin-top:20px; margin-bottom:5px;">
                                <strong>Message:</strong>
                            </p>

                            <p style="font-size:15px; color:#666; line-height:1.6;">
                                {{ $data['message'] ?? 'No message provided' }}
                            </p>

                            <hr style="margin:25px 0; border-top:1px solid #e5e5e5;">

                            <p style="font-size:14px; color:#888; text-align:center;">
                                — This email was sent from the <strong>{{ env('APP_NAME') }}</strong> Website —
                            </p>

                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>

