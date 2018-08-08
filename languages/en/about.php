<div id="page" class="about">
<div class="main_img" style="background-image: url('img/img10.jpg')"></div>
<div class="in">
<div class="section main_section" id="aboutSection_1">
	<div class="author">
        <div class="img">
            <img src="img/about/img11.jpg" alt=""/>
        </div>
        <div class="article">
            <blockquote>I have worked in Switzerland since 1994. I had more than 6,000 patients in my clinic, there was an enormous amount of work. I realized it was impossible to ever get it all done. Conventional methods of implantology were simply too time consuming and expensive; also patients simply often did not have enough bone.  
			 It was then that I developed the initial ideas for the concept of Strategic Implant<sup>®</sup> that is used worldwide today. </blockquote>
        </div>
    </div>
    <div class="main_block">
        <h1>History</h1>
        <div class="article">
            <p><strong>Dr.IhdeDental</strong> was founded in Berlin in 1954 by the dental technician Klaus Ihde. From the very beginning the company was established as a supplier of high quality consumables for dentistry. By the end of the 80s the trading company gradually transformed to include manufacturing.</p>
            <p>Today the Dr. IhdeDental Group is one of the world's leading manufacturers of dental implants for immediate loading. Its products are used in more than 40 countries. Over 1.000,000 implants have been produced in Switzerland since then, and used world wide. While the production was not done inhouse in the early years, the group has now integrated almost all production steps into the headquarters in Switzerland.</p>
            <p>Dr. IhdeDental has developed implants that show great results even in difficult cases. Very low bone supply is necessary, therefore bone transplants and augmentations became completely unnecessary.</p>
            <p>The scientific head of the group is Prof. Dr. Stefan Ihde, who received dental education in Germany (1982-1987) and further training as periodontist and oral surgeon.
			He developed modern Strategic Implant<sup>®</sup>. The Simpladent association of dental clinics, an educational system for implantologists, and the concept of immediate loading were all formed under his guidance.</p>
            <p>
                <img src="img/about/img12.jpg" alt="" />
            </p>
            <h2>What are the advantages of the Simpladent concept?</h2>
            <ul>				
				<li>The Simpladent concept has changed the world of implantology entirely.</li>
				<li>In our clinics you will be freed of all dental worries and return to your normal life very quickly.</li>
                <li>Practically every patient can receive fixed teeth right away, without extended waiting periods, healing times or bone augmentations.</li>
                <li>Our expertly trained surgeons use cortical bone in all areas of the maxillo-facial skeleton. This bone is resorption-stable and strong. For this reason we are able to install bridges right away and splint the implants thereby.</li>
                <li>Specialized dental technicians begin creating the prosthetic teeth right away. They follow a precise preparation formula to allow optimal bite and chewing abilities. You may eat anything right after the bridges are installed!</li>
            </ul>
        </div>
    </div>
    <div class="info">
        <div class="article">
            <blockquote>We use a revolutionary patented implant system with practically unlimited possibilities</blockquote>
        </div>
    </div>
    <div class="clear"></div>
</div>

<div class="section" id="aboutSection_2">
    <div class="img">
        <img src="img/about/img13.jpg" alt="" />
    </div>
    <div class="article">
        <h2>What do we offer?</h2>
        <p>Our treatment goal is to solve all of your dental problems in one sitting, such as:</p>
        <ul>
	    <li>missing teeth, inability to eat and smile; </li>
            <li>periodontal problems (inflammation of the gums, tooth mobility); </li>
            <li>endodontic problems (granulomas, cysts); </li>
            <li>problems with heavily decayed or reconstructed teeth;</li>
            
        </ul>
        <p>Typically we approach all these problems in one step. Removal of teeth and implant placement are done in the same appointment, and right after this our lab-team starts working on your new teeth. To avoid future problems, other ailing teeth likely to cause problems within the next five years will also be removed and replaced by implants.</p>
        <p>Our experience with thousands of implant operations and case observations clearly shows that implants are much more reliable than natural teeth in adult patients. We will analyze your oral situation and create an individual treatment plan.</p>
    </div>
    <div class="clear"></div>
</div>
	<div class="section" id="aboutSection_4">
        <h1>Certificate</h1>
        <div class="certificates">
                <a href="img/pdf/CE_Certificate_Simpladent.pdf" class="fancybox cert" data-fancybox-group="cert" target="_blank">
                    <img src="img/about/certificate/CE_Certificate_Simpladent.png" alt="" />
                </a>
                    </div>
        <div class="article">
            <p>We use only CE-certified dental implants made in Switzerland.</p>
        </div>
        <div class="clear"></div>
    </div>		
	
    <div class="section" id="aboutSection_5">
        <h1>Patient Testimonials</h1>
                        <div class="reviews_list">
            <?php
            foreach ($testimonials as $testimonial) {
            ?>
                <div class="review">
                <div class="auth">
                    <div class="img">
                        <img src="<?php echo 'img/about/80x80/'.$testimonial['img']; ?>" alt="" />
                    </div>
                    <div class="text">
                        <div class="name"><?php echo $testimonial->$language->name; ?></div>
                        <div class="desc"><?php echo $testimonial->$language->city; ?></div>
                    </div>
                </div>
                <div class="review_text">
                    <div class="article">
                        <blockquote><?php echo $testimonial->$language->text; ?></blockquote>
                    </div>
                </div>
                <div class="clear"></div>
            </div>

            <?php
            }
            ?>  							
									
        </div>
    </div>
    </div>


</div>