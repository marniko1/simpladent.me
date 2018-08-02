<?php @session_start();
  $appointment = true;
  require_once('../recaptcha/recaptchalib.php');
  require_once('../init.php');
  
  
  $bot = filter_input(INPUT_POST, 'CustomerID');
  
  
  // Check if a blind bot has filled out the Form
  if(strlen($bot)){
      echo "bot detected!";
      header('HTTP/1.0 403 Forbidden');
      
  } else {
      
      $name = filter_input(INPUT_POST, 'name');
      $phone = filter_input(INPUT_POST, 'phone');
      $mail = filter_input(INPUT_POST, 'mail');
      $msg = filter_input(INPUT_POST, 'comment');
      $city = filter_input(INPUT_POST, 'city');
    
      // Construck Mail Header
          $to = "To: Contact <contact@ihde.it>";
          $header = $to . "\r\n";
          $header .= 'From: websurvey@simpladent.ch' . "\r\n";
      
      
      // Evaluate Data to see if legit
      // Check name length
      if(strlen($name)){
          
          // Check Length of phone number
          if(strlen($phone)){
              
              // Check if mail has @ symbil
              if(strlen($mail) && strpos($mail, '@')){
                  
                  // All good, Sned Mail and positive response!
                  mail('william.ihde@implant.com', 'Simpladent Customer ' . $_SERVER['HTTP_HOST'], "Type: General \nName: $name \nPhone: $phone \nE-Mail: $mail \nCity: $city \nLanguage: $language \nMessage: $msg",$header);
                  echo $elements->appointments->getBack;
              }else {
                echo "E-Mail is invalid";
                header('HTTP/1.0 403 Forbidden');
                  
              }
          } else {
            echo "Please fill in your Phone Number";
            header('HTTP/1.0 403 Forbidden');
          }
      }else {
            echo "Please fill in your Name";
            header('HTTP/1.0 403 Forbidden');
          
      }
  }

?>




