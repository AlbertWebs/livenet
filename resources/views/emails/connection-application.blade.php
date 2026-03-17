<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New connection application</title>
</head>
<body style="font-family: sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <p style="margin-bottom: 1rem;"><img src="{{ url('images/livenet-logo.png') }}" alt="Livenet Solutions" style="max-height: 36px; width: auto;"></p>
    <h1 style="font-size: 1.25rem;">New Apply for Connection submission</h1>
    <p>The following application was submitted from the website.</p>
    <table style="width: 100%; border-collapse: collapse;">
        <tr><td style="padding: 6px 0; border-bottom: 1px solid #eee;"><strong>Name</strong></td><td style="padding: 6px 0; border-bottom: 1px solid #eee;">{{ $name }}</td></tr>
        <tr><td style="padding: 6px 0; border-bottom: 1px solid #eee;"><strong>Email</strong></td><td style="padding: 6px 0; border-bottom: 1px solid #eee;"><a href="mailto:{{ $email }}">{{ $email }}</a></td></tr>
        <tr><td style="padding: 6px 0; border-bottom: 1px solid #eee;"><strong>Phone</strong></td><td style="padding: 6px 0; border-bottom: 1px solid #eee;">{{ $phone ?? '—' }}</td></tr>
        <tr><td style="padding: 6px 0; border-bottom: 1px solid #eee;"><strong>Service</strong></td><td style="padding: 6px 0; border-bottom: 1px solid #eee;">{{ $service ? ($service === 'home' ? 'Home Internet' : 'Business Internet') : '—' }}</td></tr>
        @if($applicantMessage)
        <tr><td style="padding: 6px 0; border-bottom: 1px solid #eee;"><strong>Message / Address</strong></td><td style="padding: 6px 0; border-bottom: 1px solid #eee;">{{ $applicantMessage }}</td></tr>
        @endif
    </table>
    <p style="margin-top: 1.5rem; font-size: 0.9rem; color: #666;">Reply directly to the applicant using the email above.</p>
</body>
</html>
