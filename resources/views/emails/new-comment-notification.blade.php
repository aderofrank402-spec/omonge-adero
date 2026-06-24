<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Comment Notification</title>
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
                            style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); padding: 30px; text-align: center;">
                            <h1
                                style="font-family: Georgia, 'Times New Roman', serif; font-size: 24px; font-weight: bold; color: #ffffff; margin: 0;">
                                💬 New Comment Received
                            </h1>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding: 40px;">
                            <p style="font-size: 16px; color: #475569; margin: 0 0 25px 0; line-height: 1.7;">
                                A new comment has been submitted on your website and is awaiting moderation.
                            </p>

                            <!-- Post Info -->
                            <div
                                style="background-color: #f1f5f9; padding: 20px; border-radius: 8px; margin: 0 0 25px 0;">
                                <p
                                    style="font-size: 12px; text-transform: uppercase; letter-spacing: 1px; color: #64748b; margin: 0 0 8px 0;">
                                    POST
                                </p>
                                <h2
                                    style="font-family: Georgia, 'Times New Roman', serif; font-size: 20px; color: #0f172a; margin: 0;">
                                    {{ $post->title }}
                                </h2>
                                <p style="font-size: 13px; color: #64748b; margin: 8px 0 0 0;">
                                    {{ $post->type === 'blog' ? 'Blog' : 'Insight' }} •
                                    {{ $post->published_at->format('M d, Y') }}
                                </p>
                            </div>

                            <!-- Comment Details -->
                            <div style="border-left: 4px solid #0f172a; padding-left: 20px; margin: 0 0 25px 0;">
                                <p
                                    style="font-size: 12px; text-transform: uppercase; letter-spacing: 1px; color: #64748b; margin: 0 0 12px 0;">
                                    COMMENT DETAILS
                                </p>

                                <div style="margin-bottom: 15px;">
                                    <p style="font-size: 13px; color: #64748b; margin: 0 0 4px 0;">From:</p>
                                    <p style="font-size: 16px; font-weight: 600; color: #0f172a; margin: 0;">
                                        {{ $comment->name }}
                                    </p>
                                    <p style="font-size: 14px; color: #64748b; margin: 2px 0 0 0;">
                                        {{ $comment->email }}
                                    </p>
                                </div>

                                <div style="margin-top: 20px;">
                                    <p style="font-size: 13px; color: #64748b; margin: 0 0 8px 0;">Comment:</p>
                                    <p
                                        style="font-size: 15px; color: #1e293b; margin: 0; line-height: 1.6; padding: 15px; background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 6px;">
                                        {{ $comment->comment }}
                                    </p>
                                </div>

                                <p style="font-size: 12px; color: #94a3b8; margin: 12px 0 0 0;">
                                    IP Address: {{ $comment->ip_address }}
                                </p>
                            </div>

                            <!-- Action Buttons -->
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin: 30px 0 0 0;">
                                <tr>
                                    <td align="center">
                                        <a href="{{ route('admin.comments.index') }}"
                                            style="display: inline-block; background-color: #0f172a; color: #ffffff; text-decoration: none; padding: 14px 32px; border-radius: 6px; font-weight: 600; font-size: 15px; margin: 0 8px;">
                                            Review Comment
                                        </a>
                                        <a href="{{ route('admin.comments.index') }}?action=approve&id={{ $comment->id }}"
                                            style="display: inline-block; background-color: #10b981; color: #ffffff; text-decoration: none; padding: 14px 32px; border-radius: 6px; font-weight: 600; font-size: 15px; margin: 0 8px;">
                                            Quick Approve
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <!-- Post Link -->
                            <div style="margin: 30px 0 0 0; text-align: center;">
                                <a href="{{ $post->type === 'blog' ? route('blogs.show', $post->slug) : route('insights.show', $post->slug) }}"
                                    style="color: #3b82f6; text-decoration: none; font-size: 14px;">
                                    View Post →
                                </a>
                            </div>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td
                            style="background-color: #f8fafc; padding: 25px; text-align: center; border-top: 1px solid #e2e8f0;">
                            <p style="font-size: 12px; color: #94a3b8; margin: 0;">
                                This notification was sent from your Omonge Adero website
                            </p>
                            <p style="font-size: 11px; color: #cbd5e1; margin: 8px 0 0 0;">
                                {{ now()->format('M d, Y \a\t g:i A') }}
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>

</html>