<!-- resources/views/emails/contact.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Contact Message</title>
</head>
<body>
    <h2>New Contact Message</h2>
    <p><strong>Name:</strong> {{ $contact->name }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Subject:</strong> {{ $contact->subject }}</p>
    <p><strong>Message:</strong> {{ $contact->message }}</p>
</body>
</html>
