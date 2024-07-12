<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $company = htmlspecialchars($_POST['company']);
    $message = htmlspecialchars($_POST['message']);

    // Google Apps Script URL
    $url = 'YOUR_GOOGLE_APPS_SCRIPT_WEB_APP_URL';

    // Data to be sent
    $data = array(
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'company' => $company,
        'message' => $message
    );

    // Use cURL to send the data
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    // Check if the request was successful
    if ($result === FALSE) {
        // Redirect to an error page or show an error message
        header("Location: /error.html");
        exit();
    } else {
        // Redirect to the success page
        header("Location: https://www.example.com");
        exit();
    }
}
?>
