<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-ca">
<head> <?php $this->RenderAsset('Head'); ?>
<title>your Title</title>
<meta name="description" content="decribe your website here" />
<meta name="keywords" content="add your keywords here" />
<meta name="robots" content="index, follow" />
<link rel="shortcut icon" href="themes/Glass/favicon.png" type="image/x-icon" />
<link rel="apple-touch-icon" href="themes/Glass/images/apple-touch-icon.png">
<script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'blackglass'
 };
 </script> 

</head>
<body id="<?php echo $BodyIdentifier; ?>" class="<?php echo $this->CssClass; ?>">
   <div id="Frame">
      <div id="Head">
      	<h1><span><?php echo Gdn_Theme::Logo(); ?></span></a></h1>
         <div class="Menu">
				
            <?php
			      $Session = Gdn::Session();
					if ($this->Menu) {
						$this->Menu->AddLink('Dashboard', T('Dashboard'), '/dashboard/settings', array('Garden.Settings.Manage'));
						// $this->Menu->AddLink('Dashboard', T('Users'), '/user/browse', array('Garden.Users.Add', 'Garden.Users.Edit', 'Garden.Users.Delete'));
						  $this->Menu->AddLink('Activity', T('Activity'), '/activity');
                                                $this->Menu->AddLink('Home', T('Home'), 'http://www.yoursite.com/');
                                                $this->Menu->AddLink('Facebook', T('Facebook'), 'https://www.facebook.com/');
                                                $this->Menu->AddLink('Mobile View', T('Mobile View'), 'profile/mobile');
                                                $this->Menu->AddLink('New Discussion', T('New Discussion'), 'post/discussion', array('target'=>'_blank'));
                                          $Authenticator = Gdn::Authenticator();
			         $Authenticator = Gdn::Authenticator();
						if ($Session->IsValid()) {
							$Name = $Session->User->Name;
							$CountNotifications = $Session->User->CountNotifications;
							if (is_numeric($CountNotifications) && $CountNotifications > 0)
								$Name .= ' <span>'.$CountNotifications.'</span>';
								
							$this->Menu->AddLink('User', $Name, '/profile/{UserID}/{Username}', array('Garden.SignIn.Allow'), array('class' => 'UserNotifications'));
							$this->Menu->AddLink('SignOut', T('Sign Out'), $Authenticator->SignOutUrl(), FALSE, array('class' => 'NonTab SignOut'));
						} else {
							$Attribs = array();
							if (C('Garden.SignIn.Popup') && strpos(Gdn::Request()->Url(), 'entry') === FALSE)
								$Attribs['class'] = 'SignInPopup';
								
							$this->Menu->AddLink('Entry', T('Sign In'), $Authenticator->SignInUrl($this->SelfUrl), FALSE, array('class' => 'NonTab'), $Attribs);
						}
						echo $this->Menu->ToString();
					}
				?>
           
         </div>
      </div>
      <div id="Body">
         <div id="Content"><?php $this->RenderAsset('Content'); ?></div>
         <div id="Panel">
<div class="Search"><p><?php
					$Form = Gdn::Factory('Form');
					$Form->InputPrefix = '';
					echo 
						$Form->Open(array('action' => Url('/search'), 'method' => 'get')),
						$Form->TextBox('Search'),
						$Form->Button('Go', array('Name' => '')),
						$Form->Close();
				?></div></p>
<p><ul id="menu-bar">
 <li><a href="#">I N D E X</a>
   <ul>
   <li><a href="http://yoursite.org/" target="_blank">sublink</a></li>
   <li><a href="http://www.site.org/" target="_blank">sublink</a></li>
   <li><a href="http://www.site.net/" target="_blank">sublink</a></li>
   <li><a href="http://awebsite.com/" target="_blank">sublink</a></li>
  </ul>
 </li>
 </ul>
</p>
<?php $this->RenderAsset('Panel'); ?>
<p class="Center">
<iframe width="240" scrolling="no" height="292" frameborder="0" id="onlineRadioFrame" style="box-shadow: 1px 0 1px 1px #222;border-radius: 10px;" src="http://radiotuna.com/OnlineRadioPlayer/Player?showPopupControl=true&amp;playerParams={'styleSelection0':201,'styleSelection1':66,'styleSelection2':48,'textColor':16777215,'backgroundColor':16074752,'buttonColor':16777215,'glowColor':16777215,'playerSize':240,'playerType':'style'}&amp;linkText=radio&amp;linkDest=http://radiotuna.com/" allowtransparency="true"></iframe></p>
</div>
      </div>
      <div id="Foot">
<div id="FootMenu">
				
            <?php
			      $Session = Gdn::Session();
					if ($this->Menu) {
												
						
                                                $this->Menu->AddLink('Activity', T('Activity'), '/activity');
                                                $this->Menu->AddLink('Categories', T('Categories'), 'categories/all');
                                                $this->Menu->AddLink('Discussions', T('Discussions'), '/discussions');
                                                $this->Menu->AddLink('Mobile View', T('Mobile View'), 'profile/mobile');
                                                $this->Menu->AddLink('New Discussion',T('New Discussion'),'/post/discussion', array('Garden.SignIn.Allow'), array(), array('target' => '_blank'));
			         $Authenticator = Gdn::Authenticator();
						if ($Session->IsValid()) {
														
							
							$this->Menu->AddLink('SignOut', T('Sign Out'), $Authenticator->SignOutUrl(), FALSE, array('class' => 'NonTab SignOut'));
						} else {
							$Attribs = array();
							if (C('Garden.SignIn.Popup') && strpos(Gdn::Request()->Url(), 'entry') === FALSE)
								$Attribs['class'] = 'SignInPopup';
								
							$this->Menu->AddLink('Entry', T('Sign In'), $Authenticator->SignInUrl($this->SelfUrl), FALSE, array('class' => 'NonTab'), $Attribs);
						}
						echo $this->Menu->ToString();
					}
				?>
           
         </div><br><p id="back-top" style="float: right;top:0px; display: inline-block; position:relative;margin-right:0px;"><a href="#top" title="Back to Top"><img src="themes/Glass/design/images/b2t.png"></a></p>
<?php $this->RenderAsset('Foot'); 
echo Wrap(Anchor(T('Vanilla Theme by VrijVlinder'), C('Garden.VanillaUrl'),array('target' => '_blank')), 'div');	
?>
<!-- Begin TranslateThis Button -->
<div id="translate-this" style="height: 18px;margin:40px auto 0;text-align:center;float:none;"><a style="width:180px;height:18px;display:inline-block;" class="translate-this-button" href="http://www.translatecompany.com/">Translate Company</a></div>
<script type="text/javascript" src="http://x.translateth.is/translate-this.js"></script>
<script type="text/javascript">
TranslateThis();
</script>
<!-- End TranslateThis Button -->
 
   
<script type="text/javascript"> $(document).ready(function() {
    $(".Attachment a").attr("target", '_blank');
   $("#Foot #Menu a").attr("target", '_blank');
   $(".AptAdImg a").attr("target", '_blank');

});
</script>
<script type="text/javascript">
$(document).ready(function() {

	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});
</script>
</div>

	<?php $this->FireEvent('AfterBody'); ?>
</body>

</html>