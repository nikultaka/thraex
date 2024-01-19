{{-- <!DOCTYPE html>
<html>
<head>
    <title>ItsolutionStuff.com</title>
</head>
<body>
    <h1>{{ $post['title'] }}</h1>
    <p>{{ $post['body'] }}</p>
   
    <p>Thank you</p>
</body>
</html> --}}


<!DOCTYPE html>
<html>
<head>
    <title>Tried To Contact You</title>
</head>
<body>
    <h1>Contact Form Submission</h1>

    <p><strong>Name:</strong> {{ isset($details['name']) ? $details['name'] : '' }}</p>
    <p><strong>Email:</strong> {{ isset($details['email']) ? $details['email'] : '' }}</p>
    {{-- Additional fields if needed --}}
    <p><strong>Subject:</strong> {{ isset($details['subject']) ? $details['subject'] : '' }}</p>
    <p><strong>Message:</strong> {{ isset($details['message']) ? $details['message'] : '' }}</p>

    <p>Thank you for reaching out! {{ isset($details['name']) ? $details['name'] : '' }} has tried to contact you.</p>
</body>
</html>
