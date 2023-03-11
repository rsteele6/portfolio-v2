 <?php
   // identifies the email address the message will be sent to. It can be any email address, 
   // including third-party services like Gmail, Yahoo, etc
    $mail_to_send_to = "rsteele@rebeccasteele.net";

    // identifies the email address the message will be sent from. If you use a public email account like Yahoo or Gmail
    // it will likely fail because these services don't allow anonymous relay.
    $from_email = "admin@rebeccasteele.net";
    $sendflag = $_REQUEST['sendflag'];    
    $name=$_REQUEST['name'];

    if ( $sendflag == "send" )
    {
        $subject= $_REQUEST['subject'] ;
        $email = $_REQUEST['email'] ;

        $message= "\r\n" . "Name: $name" . "\r\n"; //get recipient name in contact form
        $message = $message.$_REQUEST['message'] . "\r\n" ;//add message from the contact form to existing message

        //Reply-To: $email" is the email address of the site visitor. This email is then assigned as the 
        //"Reply To" address.
        $headers = "From: $from_email" . "\r\n" . "Reply-To: $email"  ;
        $a = mail( $mail_to_send_to, $subject, $message, $headers );
        if ($a)
        {
            print("Message was sent, thank you!");
        } else {
            print("Oops, something went wrong. Please try again later");
        }
    }
?>