<div id="page" class="video">
        <div class="in">
            <div class="section main_section" id="videoSection_1">
				<div class="video_site">
				<div id="video_box"></div>
				<br />
				<hr style="color:#EEEEEE;" /> <br />
				<br />
				<div id="video_link"></div>
				<div style="clear:both;"></div>
				<br />
				<hr style="color:#EEEEEE;" /><br/>
				<div id="video_link2"></div>
				<div style="clear:both;"></div>				
			</div>
				<?PHP
					$vari = '';
					if (isset($_GET['ytid'])) {
						$vari=$_GET['ytid'];
						var_dump($_GET['ytid']);
					}
					echo('<script>infofilm="'.$vari.'";</script>');
				?>				
					<script>
						//video_link=['ei969nM_m5c','-F9lwKz-IIc','QszbCpeEiRo','EK7uB7Vt6s8','Pxn77D3P0us'];
						//video_desc=['Top 3 advantages of Immediate Load Implantation(ILI)','Am I a candidate for Immediate Load Implantation(ILI)?','I have diabetes. Can Immediate Load Implantation(ILI) be a solution for me?','Can I really eat steak 5 days after the start of the treatment?','Is Immediate Load Implantation (ILI) a painless procedure?'];
						video_link=['GsXrXTzWaLo', 'NhILOHzdIRc', 'lqQg7LGAgSA', 'BzBip26Q8d8', 'C0fJKZL_P3Q'];
						video_desc=['Welches sind die drei Hauptvorteile basaler Implantate? (Teil 1/5)', 'Bin ich ein Fall für basale Implantate? (Teil 2/5)', 'Ich habe Diabetes. Kann ich basale Implantate bekommen? (Teil 3/5)', 'Wenige Tage nach der Implantateinsetzung schon wieder Fleisch essen? (Teil 4/5)', 'Ist die basale Implantation wirklich schmerzfrei? (Teil 5/5)'];
						
						video_link_infofilm=['-xOM-T4wu-8'];
						video_desc_infofilm=['Simpladent Information Video'];

						for(a = 0; a<video_link.length;a++)
						{
							//jQuery('#video_link').append('<a href="#video_box"><div id="'+video_link[a]+'" style="background-image: url(http://img.youtube.com/vi/'+video_link[a]+'/0.jpg);" class="video_link_list"><div class="video_link_desc">'+video_desc[a]+'</div></div></a>');
							jQuery('#video_link').append('<a href="#top"><div id="'+video_link[a]+'" style="background-image: url(http://img.youtube.com/vi/'+video_link[a]+'/maxresdefault.jpg);" class="video_link_list"></div></a>');				
						}

						jQuery('#video_link2').append('<a href="#top"><div id="'+video_link_infofilm[0]+'" style="background-image: url(http://img.youtube.com/vi/'+video_link_infofilm[0]+'/0.jpg);" class="video_link_list"><div class="video_link_desc">'+video_desc_infofilm[0]+'</div></div></a>');


						jQuery(document).ready(function() 
						{
							/* *** Erweiterung für das Video Module *** */
							function insert_video(vari)
							{
								jQuery('#video_box').html('<iframe id="ytplayer" type="text/html" width="100%" height="100%" src="http://www.youtube.com/embed/'+vari+'?showinfo=0&origin=http://example.com" frameborder="0" allowfullscreen/>');
							}
							
							jQuery('.video_link_list').click(function()
							{
								insert_video(this.id);
							});
							
							if( jQuery('#video_box').text()=='' && infofilm=='' )
							{
								insert_video('GsXrXTzWaLo');
							}
							else
							{
								insert_video(infofilm);
							}							
						});
                    </script>
            </div>		
        </div>
    </div>	