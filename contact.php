
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
	
	
	if(empty($_POST["cntct_name"]))
	{
		$nameError = "Name is required";
	}
	else
	{
		$nameError="";
	}
	if(empty($_POST["cntct_email"]))
	{
		$emailError = "Email is required";
	}
	else
	{
		$email=$_POST["cntct_email"];
		if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email))
		{
			$emailError = "Email format not valid";
		}
	}
	if(empty($_POST["cntct_subject"]))
	{
		$subjectError = "subject is required";
    }
    
    if(empty($_POST["cntct_subject"]))
	{
		$subjectError = "subject is required";
    }
    
    if(empty($_POST["cntct_tel"]))
	{
		$telError = "tel no is required";
    }

	$join_msg = $_POST['join_msg'];
	$joinmsg = implode(" ",$join_msg);
	$chcktxtbox = trim($joinmsg);
	if(empty($chcktxtbox))
	{
		$msgError = "message is required";
	}
	if( !($_POST["cntct_name"]=='') && !($_POST["cntct_email"]=='') && !($_POST["cntct_subject"]=='') &&!($_POST["join_msg"]=='') )
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
			$mail->addAddress('abdshkr@gmail.com', 'TRCRC Contact');
			$mail->addReplyTo($_POST['cntct_email'],$_POST['cntct_name']);
			$join_msg = $_POST['join_msg'];
			$joinmsg = implode(" ",$join_msg);

			$mail->isHTML(true);
			$mail->Subject='TRCRC Online Contact Form : '.$_POST['cntct_subject'];
			$mail->Body='<p style=font-size:14pt; color:#1A6FB0; font-family:arial;> you have received a message from '.$_POST['cntct_name'].', '.$_POST['cntct_email'].', Tel No: '.$_POST["cntct_tel"].'. <br><br>Message<br> '.$joinmsg.'</p>';
			$location = "./contact.php#row-contact-2";
			if(!$mail->send()){
				$result="Something went wrong. Please try again";
			}
			else{
				$nametxt="";
				$result="Thank you ".$_POST['cntct_name']." for contacting us. We will get back to you soon!.";
				
				
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
<link rel="stylesheet" href="./css/contact.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<!-- Return to Top -->

<!--JS Import And CODE-->
<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

<!-- Bootstrap JS -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="icon" href="./img/logo-icon.ico">
<title> Contact - Tropical Rainforest Conservation & Research Center</title>
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
      <a href="./program.html" id="opt"><li>Programmes</li></a>
      <a href="./partnership.html" id="opt"><li>Partnership</li></a>
      <a href="./volunteer.html" id="opt"><li>Volunteering</li></a>
      <a href="./highlight.html" id="opt"><li>Highlight</li></a>
      <a href="./contact.html" id="opt"><li>Contact Us</li></a>
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
    <div class="Head-Section">
        <div class="container-fluid" id="head-content"  >
            <div class="row" idi="row-title">
                <h1 class="tracking-in-expand">Contact</h1>
            </div>
            <div class="about-lbl">
                <p><span style="font-family:'LinLibertine_R';font-size:calc(9pt + (12 - 9) * ((100vw - 300px) / (1600 - 300)));"></span><br>
                <span style="font-style: italic"></span>
                <br>Tiger paw prints were found while trekking across one of the
                    forest reserves in Malaysia. Signs of wildlife indicate a
                    healthy ecosystem</p>
            </div>
           
        </div>
    </div>
    <div class="google-map" >
        <div class="title-add">
                <h2>Address</h2>
        </div>
        
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe width="850" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Lot%202900%20%26%202901%20Jalan%207%2F71B%20Pinggiran%20Taman%20Tun%20Dr%20Ismail%2060000%20Kuala%20Lumpur%20WP%2C%20Malaysia&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                <a href="https://www.emojilib.com"></a>
            </div>
           
       </div>
        
        
        
    </div>
    <div class="address" style="position:relative; margin-top:50px; margin-left:7%; margin-right:7%;">
        <div class="add-box">
            <div class="row" id="add-title" >
                <div class="col-lg-12" >
                    <h2>Headquarters</h2>
                </div>
                <div class="col-lg-7 col-md-7" >
                    <div class="col-lg-4 " id="content-box">
                            <p class="tajuk" style="font-size:calc(12pt + (15 - 12) * ((100vw - 300px) / (1600 - 300)));">Address</p>
                            
                    </div>
                    <div class="col-lg-8 " id="content-box">
                            <p class="isi" style="font-size:calc(12pt + (14 - 12) * ((100vw - 300px) / (1600 - 300)));">Lot 2900 & 2901 Jalan 7/71B<br>
                                    Pinggiran Taman Tun Dr Ismail<br>
                                    60000 Kuala Lumpur<br>
                                    WP, Malaysia</p> 
                    </div>
                    
                </div>
                <div class="col-lg-5 col-md-5">
                    <div class="col-lg-12 " id="content-box">
                            <table id="contact-a">
                                    <tr>
                                      <td style="width:120px;  vertical-align: text-top; font-size:calc(12pt + (15 - 12) * ((100vw - 300px) / (1600 - 300)));">
                                          <P class="tajuk">Tel<br>
                                          Fax<br>
                                          Email</P>
                                      </td>
                                      <td style="width:230px;" >
                                          <P class="isi" style="text-align:right; font-size:calc(12pt + (14 - 12) * ((100vw - 300px) / (1600 - 300)));">+603 7733 5672<br>
                                                +603 7732 5670<br>
                                                ask@trcrc.org</P>
                                      </td>
                                    </tr>
                             </table>
                            
                    </div>
                    
                </div>
            </div>
            <div class="row" id="add-title" style="margin-top:5%; ">
                <div class="col-lg-6" id="left" >
                    
                <div class="kiri" style=" border-top:3px solid black;">
                    <h2>Merisuli</h2>
                    <div class="row" style="padding-left:15px;">
                        <div class="col-lg-4 " id="content-box">
                                <p class="tajuk">Address</p>
                                
                        </div>
                        <div class="col-lg-8 " id="content-box">
                                <p class="isi">c/o Forest Research Centre,<br>
                                    Sabah Forestry Department<br>
                                    Mile 14, Jalan Sepilok<br>
                                    Off Jalan Labuk<br>
                                    90000 Sandakan, Sabah<br>
                                    Malaysia</p> 
                        </div>
                    </div>
                    <div class="row" style="padding-left:15px; padding-right:15px;">
                        <table id="contact-a">
                                    <tr>
                                      <td style="width:140px;  vertical-align: text-top;">
                                          <P class="tajuk">Fax<br>
                                          Email</P>
                                      </td>
                                      <td style="width:230px;" >
                                          <P class="isi" >+ 6 08 953 1237<br>
                                            benny@trcrc.org</P>
                                      </td>
                                    </tr>
                         </table>
                    </div>
                </div>
                </div>
                <div class="col-lg-6" id="right" >
                    
                <div class="kanan" style=" border-top:3px solid black;">
                    <h2>Banun</h2>
                    <div class="row" style="padding-left:15px;">
                        <div class="col-lg-4 " id="content-box">
                                <p class="tajuk">Address</p>
                                
                        </div>
                        <div class="col-lg-8 " id="content-box">
                                <p class="isi">Tropical Rainforest Conservation<br>
                                        & Research Centre (Gerik)<br>
                                        Pejabat Hutan Daerah Hulu Perak<br>
                                        33300 Gerik, Perak<br><span style="visibility:hidden;">OK</span><br><span style="visibility:hidden;">OK</span></p> 
                        </div>
                    </div>
                    <div class="row" style="padding-left:15px; padding-right:15px;">
                        <table id="contact-a">
                                    <tr>
                                      <td style="width:140px;  vertical-align: text-top;">
                                          <P class="tajuk">Tel/Fax<br>
                                          
                                          Email</P>
                                      </td>
                                      <td style="width:230px;" >
                                          <P class="isi" >+ 6 05 791 1216<br>
                                            wihanis@trcrc.org</P>
                                      </td>
                                    </tr>
                         </table>
                    </div>
                </div>
                </div>

            </div>
            
        </div>

    </div>
    <form action="contact.php#contactus" method="POST" enctype="multipart/form-data">
    <div class="contact-us" style="margin-top:1%; " id="contactus">
        <div class="container-fluid" id="box-contact" style="padding:0;">
            <h2>Contact Us With This Form</h2>
            <div class="contact-form">
                <div class="row" id="textbox-row" style="margin-top:4%;">
                    <div class="col-lg-6" id="textbox-col">
                        <div class="textbox-kiri">
                                <input class="textbox" id="txtname" type="text" placeholder = "Enter Your Name" name="cntct_name">
                                <?php if (!empty($nameError)) { ?>
										<span class="error" style="color:red;"><?php echo $nameError; ?></span>
							    <?php }?> 
                        </div>
						

                    </div>
                    <div class="col-lg-6" id="textbox-col">
                        <div class="textbox-kanan">
                                <input class="textbox" id="txtsubject" type="text" placeholder = "Subject" name="cntct_subject">
                                <?php if (!empty($subjectError)) { ?>
										<span class="error" style="color:red;"><?php echo $subjectError; ?></span>
							    <?php }?> 
                        </div>
                    </div>
                </div>
                <div class="row" id="textbox-row" >
                        <div class="col-lg-6" id="textbox-col">
                            <div class="textbox-kiri">
                                    <input class="textbox" id="txtemail" type="text" placeholder = "Enter Your Email" name="cntct_email">
                                    <?php if (!empty($emailError)) { ?>
										<span class="error" style="color:red;"><?php echo $emailError; ?></span>
							        <?php }?> 
                            </div>
                            <div class="textbox-kiri" style="margin-top:4%;">
                                    <input class="textbox" id="txttel" type="text" placeholder = "Phone No (Eg: 012-3456789)"  name="cntct_tel">
                                    <?php if (!empty($telError)) { ?>
										<span class="error" style="color:red;"><?php echo $telError; ?></span>
							        <?php }?> 
                            </div>
    
                        </div>
                        <div class="col-lg-6" id="textbox-col" style="margin-top:3%;">
                                <div class="textbox-kanan-msg">
                                        <input class="textbox inputs" id="txtmsg" type="text" placeholder = "Write your message" name="join_msg[]" maxlength="60" >
                                        <input class="textbox inputs" id="txtmsg" type="text" placeholder = "" name="join_msg[]" maxlength="60" style="padding-top:20px;">
                                        <input class="textbox inputs" id="txtmsg" type="text" placeholder = "" name="join_msg[]" maxlength="60" style="padding-top:20px;">
                                        <?php if (!empty($msgError)) { ?>
										<span class="error" style="color:red;"><?php echo $msgError; ?></span>
							        <?php }?> 
                                </div>
                        </div>
                </div>
                <div class="row" id="textbox-row" >
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
    </form>

    <div class="follow-us" style="padding-top:3%;padding-bottom:3%;">
            <h3 style="font-family: 'Quicksand_Book';text-align: center; color:black; margin-bottom:10%;">FOLLOW US</h3>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <a href="https://www.facebook.com/trcrc.org/"><img src="./img/facebook.png" alt=""></a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <a href="https://www.instagram.com/trcrc_org/"><img src="./img/instagram.png" alt=""></a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <a href="https://www.youtube.com/channel/UC_-9bPgsC-F_cbbQha1t4Tg"><img src="./img/youtube.png" alt=""></a>
                </div>
            </div>
    </div>
    <div class="footer">
        <div class="container-fluid" id="footer-content">
            <div class="row" id="footer-1">
                <div class="col-lg-5 col-m-6 col-sm-6 col-xs-6" style="padding:0!important;">
                    <p><a href="https://drive.google.com/drive/folders/12ahAQa-NMMVu-0RECdLyNoIf5qKrlgew?usp=sharing" id="footlink">FOR THE PRESS</a></p><pre></pre><p><a href="./contact.html" id="footlink">CONTACT</a></p>
                </div>
                <div class="col-lg-7 col-m-6 col-sm-6 col-xs-6"style="padding:0 !important;">
                    <div class="logo-foot" >
                        <img src="./img/footer-logo.png" alt="" style="padding-bottom:10px;"><pre></pre><p style="font-family:'Quicksand_Bold';">© TRCRC 2019</p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    <a href="#" id="return-to-top"><i class="icon-chevron-up"></i></a>
    <script src="./scripts/scrollTop.js" ></script>
    <script>
       
            $(".inputs").keyup(function () {
                if (this.value.length == this.maxLength) {
                $(this).next('.inputs').focus();
                }
            });
       
    </script>
    <!--<script src="./scripts/gmap.js" type="text/javascript"></script>-->
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