<?php
// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$country = $_POST['country'];
$package = $_POST['select1'];
$adults = $_POST['Adults'];
$childs = $_POST['childs'];
$arrival = $_POST['Adatetime'];
$departure = $_POST['Ddatetime'];
$message = $_POST['message'];

// Compose the WhatsApp message
$whatsappMessage = "New booking request:\n\n";
$whatsappMessage .= "Name: $name\n";
$whatsappMessage .= "Email: $email\n";
$whatsappMessage .= "Country: $country\n";
$whatsappMessage .= "Package: $package\n";
$whatsappMessage .= "Adults: $adults\n";
$whatsappMessage .= "Childs: $childs\n";
$whatsappMessage .= "Arrival Date & Time: $arrival\n";
$whatsappMessage .= "Departure Date & Time: $departure\n";
$whatsappMessage .= "Special Request: $message\n";

// Write the WhatsApp message to a file
file_put_contents('whatsapp_message.txt', $whatsappMessage);

// Execute the Python script to send the WhatsApp message
$output = exec('python send_whatsapp.py');

echo "WhatsApp message sent successfully!";
?>
