

<?php

	
	



if (isset($_POST['send'])){

	$result="";
	$nameError="";
	$emailError="";
	$subjectError="";
	$messageError="";
	require 'phpmailer/PHPMailerAutoload.php';
	include 'phpmailer/class.smtp.php';

	$mail = new PHPMailer;
	
	
	if(empty($_POST["join_name"]))
	{
		$nameError = "Name is required";
	}
	else
	{
		$nameError="";
	}
	if(empty($_POST["join_email"]))
	{
		$emailError = "Email is required";
	}
	else
	{
		$email=$_POST["join_email"];
		if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email))
		{
			$emailError = "Email format not valid";
		}
	}
	if(empty($_POST["join_subject"]))
	{
		$subjectError = "subject is required";
	}
	$join_msg = $_POST['join_msg'];
	$joinmsg = implode(" ",$join_msg);
	$chcktxtbox = trim($joinmsg);
	if(empty($chcktxtbox))
	{
		$msgError = "message is required";
	}
	if( !($_POST["join_name"]=='') && !($_POST["join_email"]=='') && !($_POST["join_subject"]=='') &&!($_POST["join_msg"]=='') )
	{
		if(preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email))
		{
			
            $mail->isSMTP();
            //Enable SMTP debugging
            // 0 = off (for production use)
            // 1 = client messages
            // 2 = client and server messages
            // $mail->SMTPDebug = 2;
			$mail->Host='smtp.gmail.com';
			$mail->Port=587;//also try 465 if 587 is not support
			$mail->SMTPAuth=true; //if required password set to true
			$mail->SMTPSecure='tls'; //tls if gmail. ssl if others that support ssl
			$mail->Username='abdshkr@gmail.com';
			$mail->Password='23659210shakir';

			$mail->setFrom('abdshkr@gmail.com');
			$mail->addAddress('abdshkr@gmail.com', 'TRCRC Volunteer');
			$mail->addReplyTo($_POST['join_email'],$_POST['join_name']);
			$join_msg = $_POST['join_msg'];
			$joinmsg = implode(" ",$join_msg);

			$mail->isHTML(true);
			$mail->Subject='TRCRC Online Volunteer Form : '.$_POST['join_subject'];
			$mail->Body='<p style=font-size:14pt; color:#1A6FB0; font-family:arial;> you have received a message from '.$_POST['join_name'].', '.$_POST['join_email'].'. <br><br>Message<br> '.$joinmsg.'</p>';
			$location = "./contact.php#row-contact-2";
			if(!$mail->send()){
				$result="Something went wrong. Please try again";
			}
			else{
				$nametxt="";
				$result="Thank you ".$_POST['join_name']." for contacting us. We will get back to you soon!.";
				
				
			}
		}
	}
	

	


}

?>



<!DOCTYPE html>
<html>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
<!--CSS IMPORT-->
<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./css/volunteer.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<!-- Return to Top -->

<!--JS Import And CODE-->
<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

<!-- Bootstrap JS -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="icon" href="./img/logo-icon.ico">
<title> Volunteer - Tropical Rainforest Conservation & Research Center</title>
</head>

<body>
<!--    Made by Erik Terwan    -->
<!--   24th of November 2015   -->
<!--        MIT License        -->
<nav role='navigation'>
  <div id="menuToggle">
    <!--
    A fake / hidden checkbox is used as click reciever,
    so you can use the :checked selector on it.
    -->
    <input type="checkbox" class="menu-check"/>
    
    <!--
    Some spans to act as a hamburger.
    
    They are acting like a real hamburger,
    not that McDonalds stuff.
    -->
    <span></span>
    <span></span>
    <span></span>
    
    <!--
    Too bad the menu has to be inside of the button
    but hey, it's pure CSS magic.
    -->
    <ul class="menu-box"id="menu">
      <a href="./about.html" id="opt"><li>About Us</li></a>
      <a href="./program.html" id="opt" ><li class="prog">Programmes</a>
        <ul class="subProg">  
        <a href="./trlc.html" id="opt" ><li>TRLC</li></a>
        <a href="./fne.html" id="opt" ><li>FNE</li></a>
        <a href="./cfs.html" id="opt" ><li>CFS</li></a>
        </ul>  
        </li>
      <a href="./partnership.html" id="opt"><li>Partnership</li></a>
      <a href="./volunteer.php" id="opt"><li>Volunteering</li></a>
      <a href="./highlight.html" id="opt"><li>Highlight</li></a>
      <a href="./contact.php" id="opt"><li>Contact Us</li></a>
      <a href="https://www.landskapmalaysia.org/" id="opt"><li>Landskap Malaysia</li></a>
      <li></li>
      <li><a href="https://www.facebook.com/trcrc.org/" target="_blank"><img src="./img/facebook-m.png" alt="" id="fbimg"></a>
        &nbsp;&nbsp;&nbsp;
        <a href="https://www.instagram.com/trcrc_org/" target="_blank"><img src="./img/instagram-m.png" alt="" id="igimg"></a>
        &nbsp;&nbsp;&nbsp;
        <a href="https://www.youtube.com/channel/UC_-9bPgsC-F_cbbQha1t4Tg" target="_blank"><img src="./img/youtube-m.png" alt="" id="ytimg"></a>
      </li>
      
    </ul>
    
  </div>
</nav>
<div class="imglogo">
    <a href="./index.html"><img src="./img/logo.png" alt=""></a>
</div>
    <a href="#" id="return-to-top"><i class="icon-chevron-up"></i></a>
    <div class="vol-head" >
        <div class="container-fluid" id="vol-head-cont"  >
            <div class="row" id="row-title" >
                <h1 class="tracking-in-expand">Volunteering</h1>
            </div>
            <div class="vol-lbl">
                    <p><span style="font-family:'LinLibertine_R';font-size:calc(9pt + (12 - 9) * ((100vw - 300px) / (1600 - 300)));"></span><br>
                    <span style="font-style: italic"></span>
                    <br>TRCRC team and volunteers enjoying a peaceful night
                        around a campfire in Terengganu.</p>
             </div>
           
        </div>
    </div>

    <div class="vol-cont-1">
            <div class="container-fluid" id="vol-inf-cont"  >
                <div class="row" id="cont-1" style="margin-top:7%; margin-bottom:7%;">
                    <h2><span style="font-family: 'LinLibertine_RB';">Volunteer</span><br>
                            /Programme/</h2>
                    <br><br>
                    <p>The TRCRC Volunteer program aims to promote rainforest conservation and involve
                        communities in environmental rehabilitation. By volunteering and working with and
                        around nature and passionate staff, participants may acquire a more personal and direct
                        relationship with complex and often abstract issues such as deforestation and subsequent
                        loss of ecosystem services.
                        <br><br>
                        Participants will also make a lasting impact by helping TRCRC reach its goals. Would you
                        like to do more to protect Malaysia’s threatened plant species? If so gather your friends or
                        colleagues and join a program at one of our Tropical Living Collections.
                        <br><br>
                        Send us a message below or contact <b><a href="mailto:adam@trcrc.org" id="mailto">adam@trcrc.org</a></b>.
                    </p>
                </div>
            </div>
    </div>

    <div class="vol-cont-2">
        <div class="vol-lbl-left">
              <!--<p><span style="font-family:'LinLibertine_R';font-size:calc(10pt + (14 - 10) * ((100vw - 300px) / (1600 - 300)));">Lorem ipsum</span><br>
                <span style="font-style: italic">/Lorem ipsum/</span>
                <br>Lorem Ipsum is simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry's
                standard dummy text ever since the 1500s</p>-->  
         </div>
    </div>
    <form action="volunteer.php#join-us" method="POST" enctype="multipart/form-data">
    <section class="contact-join" id="join-us" >
        <div class="container-fluid">
            <div class="row" id="title-form">
                <h1>CONTACT US AT</h1>
            </div>
            <div class="row" id="join-form">
                
                <div class="col-lg-6" id="col-kiri">
                    <div class="textbox-kiri">
                            <input class="textbox" id="txtname" type="text" placeholder = "Enter your name" name="join_name" value="<?php if (!empty($nametxt)) {echo $nametxt;} ?>">
                            <?php if (!empty($nameError)) { ?>
										<span class="error" style="color:red;"><?php echo $nameError; ?></span>
							<?php }?>    
                    </div>
                    <div class="textbox-kiri">
                            
                            <input class="textbox" id="txtemail" type="text" placeholder = "Enter your email" name="join_email" value="<?php if (!empty($emailtxt)) {echo $emailtxt;} ?>">
                            <?php if (!empty($emailError)) { ?>
										<span class="error" style="color:red;"><?php echo $emailError; ?></span>
							<?php }?>   
                    </div>
                    <!--<div class="textbox-kiri">
                            
                            <p>Upload Your CV</p>
                    </div>
                    <div class="textbox-kiri"style="border:none;">
                            <div class="customFile rightBtn" data-display="vertical" data-label="Choose File..">
                                <input id="upload" type="file" name="file" id="file" accept="application/pdf" style="display:none;"/>
                                <a class="btn-upload" id="upload_link" data-label="Choose File..">Browse file</a> 
                                <p class="selectedFile">No file choosen</p> 
                            </div> 
                            
                    </div>-->
                    
                </div>
                <div class="col-lg-6" id="col-kanan">
                    <div class="textbox-kanan">
                            <input class="textbox" id="txtsubject" type="text" placeholder = "Subject" name="join_subject">
                            <?php if (!empty($subjectError)) { ?>
										<span class="error" style="color:red;"><?php echo $subjectError; ?></span>
							<?php }?>
                    </div>
                    <div class="textbox-kanan-msg">
                            <input class="textbox inputs" id="txtmsg" type="text" placeholder = "Write your message" name="join_msg[]" maxlength="60">
                            <input class="textbox inputs" id="txtmsg" type="text" placeholder = "" name="join_msg[]" maxlength="60">
                            <input class="textbox inputs" id="txtmsg" type="text" placeholder = "" name="join_msg[]" maxlength="60">
                            <?php if (!empty($msgError)) { ?>
										<span class="error" style="color:red;"><?php echo $msgError; ?></span>
							<?php }?>  
                    </div>
                    
                    <div class="textbox-kanan" style="border:none;">
                    <?php if (empty($result)) { ?>
                            <button class="btn-submit" type="submit" name="send" value="SEND">SEND<span id="right-arrow"><i class="fas fa-chevron-right"></i></span></button>
                    <?php } else {?>
                        <?php if ($result == "Something went wrong. Please try again") {?>
                            <div class="msg" style="float:right;margin-bottom:30px; color:red;">
                                                <p><?php echo $result; ?></p>
                        <?php } else {?>
                        
                                <div class="msg" style="float:right;margin-bottom:30px; color:#4ABB90;">
                                                <p><?php echo $result; ?></p>
                                </div>
                        <?php }?>
                        
					<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </form>
    <div class="footer">
        <div class="container-fluid" id="footer-content">
            <div class="row" id="footer-1">
                <div class="col-lg-4">
                    <p><a href="https://drive.google.com/drive/folders/12ahAQa-NMMVu-0RECdLyNoIf5qKrlgew?usp=sharing" id="footlink">FOR THE PRESS</a></p><pre></pre><p><a href="./contact.html" id="footlink">CONTACT</a></p>
                </div>
                <div class="col-lg-8">
                    <div class="logo-foot" >
                        <img src="./img/footer-logo.png" alt="" style="padding-bottom:10px;"><pre></pre><p style="font-family:'Quicksand_Bold';">© TRCRC 2019</p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
<script src="./scripts/scrollTop.js" type="text/javascript"></script>
<script>
        (function($) {
        $.fn.mnFileInput = function(params) {
            this.change(function(e) {
              $valueDom = $(this).closest('.customFile').find('.selectedFile');
              // $valueDom.addClass('inProgress');
              var filename = $('.customFile').data('label');
              if(e.target){
                var fullPath = e.target.value;
                filename = fullPath.replace(/^.*[\\\/]/, '');
                $valueDom.text(filename);
                // $valueDom.removeClass('inProgress');
              }
            });
        };
    })(jQuery);
    
    $(".customFile > input").mnFileInput();
    
    /*
    $(".customFile > input").change(function(e) {
      $valueDom = $(this).closest('.customFile').find('.selectedFile');
      // $valueDom.addClass('inProgress');
      var filename = $('.customFile').data('label');
      if(e.target){
        var fullPath = e.target.value;
        filename = fullPath.replace(/^.*[\\\/]/, '');
        $valueDom.text(filename);
        // $valueDom.removeClass('inProgress');
      }
    });
    */
        </script>
    <script>
        $(function(){
    $("#upload_link").on('click', function(e){
        e.preventDefault();
        $("#upload:hidden").trigger('click');
    });
    });
    </script>
    <script>
       
            $(".inputs").keyup(function () {
                if (this.value.length == this.maxLength) {
                $(this).next('.inputs').focus();
                }
            });
       
    </script>
    <script>
        $('#fbimg').hover(function() {
        $(this).attr('src', './img/facebook-m-b.png');
        }, function() {
        $(this).attr('src', './img/facebook-m.png');
        });

        $('#igimg').hover(function() {
        $(this).attr('src', './img/instagram-m-b.png');
        }, function() {
        $(this).attr('src', './img/instagram-m.png');
        });

        $('#ytimg').hover(function() {
        $(this).attr('src', './img/youtube-m-b.png');
        }, function() {
        $(this).attr('src', './img/youtube-m.png');
        });
    </script>
</body>

</html>