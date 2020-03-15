<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <title>Kunz Law, PLLC</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="shortcut icon" href="/home/paul/Web_Projects/Kunz_Law_PLLC/en/images/014-balance.png" type="image/x-icon" />
  </head>

  <body>
    <header id="navbar">
      <ul class="nav-links-header">
        <li class="nav-item-header bold"><a href='index.html'>| Kunz Law, PLLC</a></li>
        <li class="nav-item-header"><a href='about.html'>| About Us</a></li>
        <li class="nav-item-header"><a href='services.html'>| Services</a></li>
        <li class="nav-item-this-page"><a href='contact.html'>| Contact Us</a></li>
        <li class="first-right-side-link"><a href="https://www.facebook.com/kunzlawpllc/" target="_blank">
            <img src="images/facebook.png" alt="facebook" class="social-media"></a></li>
        <li class="right-side-link"><a href="file:///home/paul/Web_Projects/Kunz_Law_PLLC/es/contact.html">
            <img src="images/MexicoFlag.png" alt="Mexican Flag"></a></li>
      </ul>
    </header>
    <div class="parallax-10"></div>
    <div id="text-intro">Contact us today and see what we can do for you.</div>
    </div>
    <?php
      $statusMsg = '';
      $msgClass = '';
      if(isset($_POST['submit'])){
    
        // Get the submitted form data
        $email = $_POST['email'];
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
    
        // Check whether submitted data is not empty
        if(!empty($email) && !empty($name) && !empty($subject) && !empty($message)){
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $statusMsg = 'Please enter your valid email.';
            $msgClass = 'errordiv';
        }else{
            // Recipient email
            $toEmail = 'user@example.com';
            $emailSubject = 'Contact Request Submitted by '.$name;
            $htmlContent = '<h2>Contact Request Submitted</h2>
                <h4>Name</h4><p>'.$name.'</p>
                <h4>Email</h4><p>'.$email.'</p>
                <h4>Subject</h4><p>'.$subject.'</p>
                <h4>Message</h4><p>'.$message.'</p>';
            
            // Set content-type header for sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // Additional headers
            $headers .= 'From: '.$name.'<'.$email.'>'. "\r\n";
            
            // Send email
            if(mail($toEmail,$emailSubject,$htmlContent,$headers)){
                $statusMsg = 'Your contact request has been submitted successfully !';
                $msgClass = 'succdiv';
            }else{
                $statusMsg = 'Your contact request submission failed, please try again.';
                $msgClass = 'errordiv';
            }
        }
    }else{
        $statusMsg = 'Please fill all the fields.';
        $msgClass = 'errordiv';
    }
}
    ?>
    <section class="paragraph-3">
      <section class="contact-form">
        <?php if(!empty($statusMsg)){ ?>
        <p class="statusMsg <?php echo !empty($msgClass)?$msgClass:''; ?>"><?php echo $statusMsg; ?></p>
        <?php } ?>
        <form action="" method="POST">

          <label for="fname">Name (Required)</label><br>
          <input type="text" id="name" name="name" placeholder=" "><br>

          <label for="lname">Phone Number (Required)</label><br>
          <input type="text" id="pnumber" name="phonenumber" placeholder=" "><br>

          <label for="lname">Email Address (Optional)</label><br>
          <input type="text" id="emaddress" name="emailaddress" placeholder=" "><br>

          <label for="category">Type of Assistance Needed</label><br>
          <select id="category" name="category">
            <option value="cDefense">Criminal Defense</option>
            <option value="traffic">Traffic</option>
            <option value="famLaw">Family Law</option>
            <option value="immigration">Immigration</option>
          </select><br>

          <label for="subject">Subject</label><br>
          <input type="text" id="subject" name="subject" placeholder=" "><br>

          <textarea id="story" name="story" placeholder="How can we help you?" style="height:200px"></textarea><br>

          <h5>Please do not send sensitive information via this submission form.
            Included comments are not secure nor subject to attorney-client privilege.</h5><br>

          <input type="submit" value="Submit">

        </form>
      </section>
    </section>
    <footer>
      <ul class="nav-links-footer">
        <li class="nav-item-footer">
          <p>&copy; 2020 KUNZ LAW, PLLC</p>
        </li>
        <li class="nav-item-footer"><a href='about.html'>| ABOUT US</a></li>
        <li class="nav-item-footer"><a href='services.html'>| SERVICES</a></li>
        <li class="nav-item-footer"><a href='contact.html'>| CONTACT US</a></li>
        <li class="nav-item-footer"><a href='credits.html'>| CREDITS</a></li>
      </ul>
    </footer>
    <script src="scripts/stickyNavbar.js"></script>
  </body>

</html>
