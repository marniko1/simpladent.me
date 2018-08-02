<?php 
	$clinic = filter_input(INPUT_GET, 'c');
	$file = './includes/clinics/'.$clinic.'.xml';
	if(is_file($file)){
		$clElements = simplexml_load_file($file);
?>

<div id="page" class="about">
	<div class="main_img" style="background-image: url('img/img10.jpg')"></div>
	<div class="in">
		<div class="section main_section" id="clinicSection_1">
			<div class="author">
				<div class="img"style="background-color:white;"><img src="/img/contact/clinics/<?php echo $clinic; ?>/logo.png" alt="" style="width:200px; background-color:white;" /></div>
				<div class="article">
					<blockquote><?php echo $clElements->einleitung->$language ;?></blockquote>
				</div>
			</div>
			<div class="main_block">
				<h1><?php echo $clElements->name; ?></h1>
				<br />
				<div class="article">
					<p>
					<?php
						echo $clElements->address->name->$language."<br />";
						echo $clElements->address->street->$language."<br />";
						echo $clElements->address->town->$language."<br />";
						echo $clElements->address->land->$language."<br />";
						echo('<h3>'.$elements->slang->phone.'</h3>');
							foreach($clElements->address->phone as $phone)
							{
								echo($phone.'<br />');
							}				
						echo('<h3>'.$elements->slang->email.'</h3>'.$clElements->address->email.'<br />');
						echo('<h3>'.$elements->slang->homepage.'</h3>');
							foreach($clElements->address->homepage as $hpage)
							{
								echo("<a href='$hpage' target='_blank'>$hpage</a>");
							}
					?>
					</p><form method="post" id="contact">
                        <br />
                        <h2><?php echo $elements->appointments->title; ?></h2>
                        <table>
							<tr>
                                <td><?php echo $elements->contact->name ; ?></td>
                                <td><input type="text" name="name" /> </td>
                            </tr>
                            <tr>
                                <td><?php echo $elements->contact->number ; ?></td>
                                <td><input type="text" name="phone" /></td>
                            </tr>
                            <tr>
                                <td><?php echo $elements->contact->mail ; ?></td>
                                <td><input type="text" name="mail" /></td>
                            </tr>
                            <tr>
                                <td><?php echo $elements->appointments->comment ; ?></td>
                                <td><textarea name="comment" style="width: 203px;"></textarea></td>
                            </tr>
                            <tr>
                                <input type="text" name="customerID" id="customerID"/>
                                <input type="hidden" name="city" id="city" value="<?php $clinic?>"/>
                                <td colspan="2" align="right"><input type="submit" value="<?php echo $elements->contact->send ; ?>" /></td>
                            </tr>
                        </table>
                        </form>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="section" id="clinicSection_2">
			<?PHP echo('<div class="Headline">'.$elements->slang->team.'</div><br />'); ?>
			<br />
			<div id="team_doctor">
				<?PHP
					echo('<b>'.$elements->slang->doctor.'</b><br />');
					foreach($clElements->team->doctors->doc as $pic_doc)
					{
						if($pic_doc->image != '')
						{
							echo('<a href="'.$pic_doc->image.'" class="picturepopup"><div class="pic_all" style="background-image:url('. $pic_doc->image .')"><div class="pic_all_name">'.$pic_doc->name.'</div></div></a>');
						}
					}
				?>
			</div>
			
			<div id="team_assis">
			<?PHP
				if($clElements->team->assistants->assist->image != '')
				{ 
					echo('<br /> <br />');
					echo('<b>'.$elements->slang->assistant.'</b><br />');
					foreach($clElements->team->assistants->assist as $pic_assist)
					{
						if($pic_assist->image != '')
						{
							echo('<a href="'.$pic_assist->image.'" class="picturepopup"><div class="pic_all" style="background-image:url('. $pic_assist->image .')"><div class="pic_all_name">'.$pic_assist->name.'</div></div></a>');
						}
					}
				}
			?>
			</div>
		
			<div id="team_staff">
			<?PHP
				if($clElements->team->staff->staff->image != '')
				{ 
					echo('<br /> <br />');
					echo('<b>'.$elements->slang->staff.'</b><br />');
					foreach($clElements->team->staff->staff as $pic_staff)
					{
						if($pic_staff->image != '')
						{
							echo('<a href="'.$pic_staff->image.'" class="picturepopup"><div class="pic_all" style="background-image:url('. $pic_staff->image .')"><div class="pic_all_name">'.$pic_staff->name.'</div></div></a>');
						}
					}
				}
			?>
			</div>			

			<div id="team_manager">
			<?PHP
				if($clElements->team->office_manager->manager->image!='')
				{
					echo('<br /> <br />');
					echo('<b>'.$elements->slang->manager.'</b><br />');
					foreach($clElements->team->office_manager->manager as $pic_manager)
					{
						if($pic_manager->name->$language != '')
						{
							echo('<a href="'.$pic_manager->image.'" class="picturepopup"><div class="pic_all" style="background-image:url('. $pic_manager->image .')"><div class="pic_all_name">'.$pic_manager->name->$language.'</div></div></a>');
						}
					}
				}
			?>
			</div>
			
			
			<br />
			<br />
			<?PHP 
				if($clElements->office->clinic->image!='')
				{
					echo('<div class="Headline">'.$elements->slang->clinic.'</div><br />');

					//echo('<b>'.$elements->slang->clinic.'</b><br />');
					foreach($clElements->office->clinic as $pic_clinic)
					{
						if($pic_clinic->image != '')
						{
							echo('<a href="'.$pic_clinic->image.'" class="picturepopup"><div class="pic_all" style="background-image:url('. $pic_clinic->image .')"><div class="pic_all_name">'.$pic_clinic->name->$language.'</div></div></a>');
						}
					}
				}
			?>
			<br />
			<br />
			<br />
			<?PHP 
				if($clElements->accommodation->acc->name)
				{
					echo('<div class="Headline">'.$elements->slang->accommodations.'</div><br /><br />');

					//echo('<b>'.$elements->slang->clinic.'</b><br />');
					foreach($clElements->accommodation->acc as $pic_acc)
					{
						if($pic_acc->name != '')
						{
							echo('<div class="accom_main">');
							if($pic_acc->image !=''){ echo('<div class="accom_image" style="background-image:url('. $pic_acc->image .')"></div>'); }
							echo('<div class="accom_name">'.$pic_acc->name.'</div><div class="accom_website"><a href="'.$pic_acc->website.'" target="_blank">'.$pic_acc->website.'</a></div></div>');
						}
					}
				}
			?>
			<div class="nofloat"></div>
		</div>
	<div class="section" id="aboutSection_5"></div>
	</div>
</div>

<?php 	
	}else {
		
		 echo("Error <br />");
		 echo __file__;
		 echo "<br />";
		 echo __dir__;
		 //echo "Mich gibts nicht: ./includes/clinics/$clinic.xml";
	}


?>

