<?php

    // Create the basic email info to send
    $email_to = "salmousawi@roc-dev.com";
    $subject = "Betreft: Factuur Rent a Car";

    // Create the email headers
    $headers = "From: Rent a Car <salmousawi@roc-dev.com>\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    // Create the html message
    $message = "<html>
        <style>
        
            body {
                background-color: white;
            }
            
            image {
                width: 50px;
            }
                   
        </style>
        
        <body>
            <div>
                <h1>Factuur</h1>       
                <p>Meerstraat 13</p>
                <p>1334 HK Almere</p>
                <p>Telefoon: (036)-39224932</p>
                <br>
                <p>Datum:</p>
                <p>Factuurnummer</p>
                <p>Behandelaar:</p>
                <img class='image' src='https://i.imgur.com/71kLQIZ.png'/>
            </div>
        </body>
    </html>";

    // Send email to the user
    if (mail($email_to, $subject, $message, $headers)) {
        echo "Vacature is gestuurd naar uw email";
    } else {
        "Not sent";
    }
?>