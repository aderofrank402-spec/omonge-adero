<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Your Subscription</title>
</head>

<body
    style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; line-height: 1.6; color: #334155; background-color: #f8fafc; margin: 0; padding: 0;">

    <table width="100%" cellpadding="0" cellspacing="0" border="0"
        style="background-color: #f8fafc; padding: 40px 20px;">
        <tr>
            <td align="center">
                <table width="100%" cellpadding="0" cellspacing="0" border="0"
                    style="max-width: 600px; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);">

                    <!-- Header -->
                    <tr>
                        <td
                            style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); padding: 40px 30px; text-align: center;">
                            <h1
                                style="font-family: Georgia, 'Times New Roman', serif; font-size: 32px; font-weight: bold; color: #ffffff; margin: 0 0 8px 0;">
                                Brian Adero
                            </h1>
                            <p
                                style="font-size: 11px; text-transform: uppercase; letter-spacing: 2px; color: #94a3b8; margin: 0;">
                                Advocate of the High Court of Kenya
                            </p>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding: 50px 40px;">
                            <h2
                                style="font-family: Georgia, 'Times New Roman', serif; font-size: 28px; font-weight: bold; color: #0f172a; margin: 0 0 20px 0;">
                                Confirm Your Subscription
                            </h2>

                            <p style="font-size: 16px; color: #475569; margin: 0 0 20px 0; line-height: 1.7;">
                                Thank you for your interest in receiving legal insights and updates from my practice.
                            </p>

                            <p style="font-size: 16px; color: #475569; margin: 0 0 30px 0; line-height: 1.7;">
                                To complete your subscription and start receiving expert analysis on corporate law,
                                family practice, and current legal affairs, please confirm your email address by
                                clicking the button below:
                            </p>

                            <!-- CTA Button -->
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin: 35px 0;">
                                <tr>
                                    <td align="center">
                                        <a href="{{ route('subscribe.verify', $token) }}"
                                            style="display: inline-block; background-color: #0f172a; color: #ffffff; text-decoration: none; padding: 16px 40px; border-radius: 6px; font-weight: 600; font-size: 16px; box-shadow: 0 4px 6px rgba(15, 23, 42, 0.2); transition: all 0.3s;">
                                            Confirm Subscription
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <!-- Divider -->
                            <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 35px 0;">

                            <!-- Alternative Link -->
                            <p style="font-size: 14px; color: #64748b; margin: 0 0 15px 0; line-height: 1.6;">
                                If the button doesn't work, copy and paste this link into your browser:
                            </p>
                            <p style="font-size: 13px; color: #3b82f6; word-break: break-all; margin: 0 0 25px 0;">
                                {{ route('subscribe.verify', $token) }}
                            </p>

                            <!-- Security Notice -->
                            <div
                                style="background-color: #f1f5f9; border-left: 4px solid #64748b; padding: 16px 20px; border-radius: 4px; margin: 25px 0 0 0;">
                                <p style="font-size: 13px; color: #475569; margin: 0; line-height: 1.6;">
                                    <strong style="color: #1e293b;">Didn't subscribe?</strong><br>
                                    If you didn't request this subscription, you can safely ignore this email. No
                                    further action is required.
                                </p>
                            </div>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td
                            style="background-color: #f8fafc; padding: 30px 40px; text-align: center; border-top: 1px solid #e2e8f0;">
                            <p style="font-size: 13px; color: #64748b; margin: 0 0 8px 0; line-height: 1.5;">
                                This email was sent by <strong style="color: #475569;">Brian Adero & Co.
                                    Advocates</strong>
                            </p>
                            <p style="font-size: 12px; color: #94a3b8; margin: 0 0 15px 0;">
                                Nairobi, Kenya
                            </p>

                            <!-- Social Links (Optional) -->
                            <div style="margin: 15px 0 0 0;">
                                <a href="{{ route('home') }}"
                                    style="color: #64748b; text-decoration: none; font-size: 12px; margin: 0 10px;">
                                    Visit Website
                                </a>
                                <span style="color: #cbd5e1;">|</span>
                                <a href="{{ route('contact') }}"
                                    style="color: #64748b; text-decoration: none; font-size: 12px; margin: 0 10px;">
                                    Contact
                                </a>
                            </div>

                            <p style="font-size: 11px; color: #94a3b8; margin: 20px 0 0 0;">
                                &copy; {{ date('Y') }} Brian Adero. All rights reserved.
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>

</html>