<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $package = $_POST['package'];
    $adults = $_POST['Adults'];
    $children = $_POST['childs'];
    $arrival_datetime = $_POST['Adatetime'];
    $departure_datetime = $_POST['Ddatetime'];
    $special_request = $_POST['message'];

    // Compose the email message
    $to = "pasachiya@gmail.com"; // Change this to your email address
    $subject = "New Booking Request";
    $message = "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Country: $country\n";
    $message .= "Package: $package\n";
    $message .= "Adults: $adults\n";
    $message .= "Children: $children\n";
    $message .= "Arrival Date & Time: $arrival_datetime\n";
    $message .= "Departure Date & Time: $departure_datetime\n";
    $message .= "Special Request: $special_request\n";
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you! Your booking request has been submitted.";
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
} else {
    echo "Oops! Invalid request.";
}
?>
