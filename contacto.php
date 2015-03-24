<?php
//If the form is submitted
if(isset($_POST['submit'])) {

  //Check to make sure that the name field is not empty
  if(trim($_POST['contactname']) == '') {
    $hasError = true;
  } else {
    $name = trim($_POST['contactname']);
  }

  //Check to make sure that the subject field is not empty
  if(trim($_POST['phone']) == '') {
    $hasError = true;
  } else {
    $phone = trim($_POST['phone']);
  }

  //Check to make sure that the subject field is not empty
  if(trim($_POST['subject']) == '') {
    $hasError = true;
  } else {
    $subject = trim($_POST['subject']);
  }

  //Check to make sure sure that a valid email address is submitted
  if(trim($_POST['email']) == '')  {
    $hasError = true;
  } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
    $hasError = true;
  } else {
    $email = trim($_POST['email']);
  }

  //Check to make sure comments were entered
  if(trim($_POST['message']) == '') {
    $hasError = true;
  } else {
    if(function_exists('stripslashes')) {
      $comments = stripslashes(trim($_POST['message']));
    } else {
      $comments = trim($_POST['message']);
    }
  }

  //If there is no error, send the email
  if(!isset($hasError)) {
    $emailTo = 'liz_villegas@live.com.mx'; //Put your own email address here
    $body = "Nombre:\n $name \n\nEmail:\n $email \n\nSubject:\n $subject \n\n Teléfono:\n $phone \n\nComments:\n $comments";
    $headers = 'From: Adan Site<'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

    mail($emailTo, $subject, $body, $headers);
    $emailSent = true;
  }
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Adan Gracia Dulipo</title>

    <link href="css/style.css" rel="stylesheet"><!--NEW-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
  // validate signup form on keyup and submit
  var validator = $("#contactform").validate({
    rules: {
      contactname: {
        required: true,
        minlength: 2
      },
      email: {
        required: true,
        email: true
      },
      phone: {
        required: true,
        minlength: 10
      },
      subject: {
        required: true,
        minlength: 10
      },
      message: {
        required: true,
        minlength: 10
      }
    },
    messages: {
      contactname: {
        required: "Porfavor escribe tu nombre",
        minlength: $.format("Tu nombre debe tener al menos {0} letras")
      },
      email: {
        required: "Porfavor escribe un email válido",
        minlength: "Porfavor escribe un email válido"
      },
      phone: {
        required: "Necesitas escribir tu teléfono, no te preocupes primero te contactare por email.",
        minlength: jQuery.format("Escribe al menos {0} numeros")
      },
      subject: {
        required: "Necesitas escribir un asunto!",
        minlength: jQuery.format("Escribe al menos {0} letras")
      },
      message: {
        required: "Escribeme alguna duda o sugerencia!",
        minlength: jQuery.format("Escribe al menos {0} letras")
      }
    },
    // set this class to error-labels to indicate valid fields
    success: function(label) {
      label.addClass("checked");
    }
  });
});
</script>
  </head>
<!-- NAVBAR
================================================== -->
  <body class="customed">
    <div class="navbar-wrapper">
      <div class="container">
        <div class="navbar navbar-inverse navbar-static-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.html"><img src="images/logo.png"></a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="portfolio.html">Portafolio</a></li>
                <li><a href="servicios.html">Servicios</a></li>
                <li class="active"><a href="contacto.php">Contacto</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="totalImg contacto">
      <div class="blockContact">
        <h2>Información</h2>
      </div>
    </div> 
    <section class="clearfix contacto">
      <article class="col-lg-6 col-sm-6 col-xs-12">
        <h2>Interesado?</h2>
        <span>Tienes alguna duda sobre mis servicios? Escribe en este formulario y te responderé a la brevedad:</span>
        <ul>
          <li class="icon facebook">
            <a href="https://www.facebook.com/pages/Sindro-mess/217159031693509?ref=bookmarks">/Adan Garcia</a>
          </li>
          <li class="icon correo">
            <a href="mailto:adan@adangarcia.com">adan@adangarcia.com</a>
          </li>
          <li class="icon linkedin">
            <a href="http://mx.linkedin.com/pub/ad%C3%A1n-garc%C3%ADa-pulido/62/739/563/">Adan Garcia</a>
          </li>
        </ul>
      </article>
      <aside class="col-lg-6 col-sm-6 col-xs-12">
        <?php if(isset($hasError)) { //If errors are found ?>
          <p class="error">Porfavor revisa que todos los campos tengan la información requerida e intenta de nuevo. Gracias.</p>
        <?php } ?>

        <?php if(isset($emailSent) && $emailSent == true) { //If email is sent ?>
          <div class="success">
            <p><strong>E-mail enviado exitosamente!</strong></p>
            <p>Gracias por ponerte en contacto conmigo <strong><?php echo $name;?></strong>! Ya estoy revisando tu e-mail y muy pronto estaré en contacto contigo.</p>
          </div>
        <?php } ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contactform">
          <div class="contactForm">
            <div>
              <input type="text" name="contactname" id="contactname" value="" class="required" role="input" aria-required="true" placeholder="Escribe tu nombre">
            </div>
            <div>
              <input type="text" name="email" id="email" value="" class="required email" role="input" aria-required="true" placeholder="Escribe tu e-mail">
            </div>
            <div>
              <input type="text" name="phone" id="phone" value="" class="required" role="input" aria-required="true" placeholder="Escribe tu teléfono">
            </div>
            <div>
              <input type="text" name="subject" id="subject" value="" class="required" role="input" aria-required="true" placeholder="Asunto">
            </div>
            <div>
              <textarea id="mensaje" name="message" id="message" class="required" role="textbox" aria-required="true" placeholder="Escribe tu mensaje"></textarea>
            </div>
            <div>
              <input type="submit" class="button" value="Enviar" name="submit" id="submitButton" title="Da click aquí para enviar el mensaje!" />
            </div>
          </div>
        </form>
      </aside>
    </section>
  </body>
</html>
