<div id="page" class="about">
<div class="main_img" style="background-image: url('img/img10.jpg')"></div>
<div class="in">
<div class="section main_section" id="aboutSection_1">
    <div class="author">
        <div class="img">
            <img src="img/about/img11.jpg" alt=""/>
        </div>
        <div class="article">
            <blockquote>Od 1994. godine radio sam u Švajcarskoj. U mojoj klinici je bilo preko  6000 redovnih pacijenata; bilo je veoma mnogo posla. Meni je postalo jasno, da kod toliko velikog broja pacijenata 
			nije bilo moguće sa radom završiti. Implantologija sa konvencionalnim implantatima iziskuje jednostavno suviše vremjena i skupa je, uz to pacijenti često nisu imali dovoljno kostiju
			Tada sam razvio osnovnu ideju koncepta tretmana „Strategic Implant“, koja se danas širom svijeta primenjuje.
			</blockquote>
        </div>
    </div>
    <div class="main_block">
        <h1>Istorijat</h1>
        <div class="article">
            <p><strong>Dr.IhdeDental</strong> grupa je osnovao zubni tehničar Klaus Ihde u Berlinu. Od samog početka kompanija se profilirala kao snabdjevač visokokvalitetnog stomatološkog potrošnog materijala. 
			Od kraja 80 tih godina kompanija se polako transformisala u jedno preduzeće za proizvodnjom.</p>
            <p>Dr. IhdeDental je danas jedna od vodećih kompanija za proizvodnju dentalnih implantata za rad u protokolu imedijatnog opterećenja. Proizvodi se primenjuju u više od 40 zemalja. Do sada je proizvedeno više od 1.000.000 implantata,
			u proizvodnim pogonima u Švajcarskoj i nakon toga širom svijeta se primenjuju.</p>
            <p>Dr. IhdeDental je zajedno sa <strong>Simpladent</strong> Implantate razvio i način postupak tretmana, koji čak i u teškim slučajevima postiže odlične rezultate. Potrebno je veoma malo
			koštane strukture, tako da je transplantacija kosti i postupak augmentacije kompletno nepotrebna.</p>
            <p>Naučni dio preduzetničke grupe vodi Dr. Stefan Ihde, koji je stomatološko obrazovanje stekao u Njemačkoj kasnije usavršavao i apsolvirao za paradontologa i oralnog hirurga.  
			On je razvio modernu stratešku implantologiju. Pod njegovim vođstvom je osnovana Simpladent asocijacija dentalnih klinika, jedan sistem obrazovanja za implantologiju i imedijatnog opterećenja.</p>
            <p>
                <img src="img/about/img12.jpg" alt="" />
            </p>
            <h2>Koje prednosti nudi Simpladent-koncept?</h2>
            <ul>				
				<li>Simpladent koncept je potpuno promijenio svijet implantologije. U našim klinikama ćete se brzo osloboditi svojih problema sa zubima i voditi jedan normalan život sa čvrstim zubima:</li>
				<li>Danas skoro svaki pacijent može dobiti čvrste zube, bez dugog čekanja, bez augmentacije i bez čekanja na „zarastanje“</li>
                <li>Dobro obrazovani implantolozi koriste za učvršćivanje implantata samo stabilne, strateške delove kostiju, koji svaki čovek ima u dovoljnoj mjeri.. Zato uspijevamo nove zube odmah pripojimo i implantate stavimo u šine. </li>
                <li>Posebno podučen zubni tehničar će Vam odmah napraviti protezu. U tome slijede, po jednoj tačno propisanoj šemi proizvodnje, koja omogućava dobar zagriz i optimalno žvakanje.</li>
                <li>Nakon ugradnje mostova možete odmah sve da jedete!</li>
            </ul>
        </div>
    </div>
    <div class="info">
        <div class="article">
            <blockquote>Mi primenjujemo jedan revolucionarni, patentirani sistem implantalogije sa skoro neograničenim mogućnostima.</blockquote>
        </div>
    </div>
    <div class="clear"></div>
</div>

<div class="section" id="aboutSection_2">
    <div class="img">
        <img src="img/about/img13.jpg" alt="" />
    </div>
    <div class="article">
        <h2>1. Šta možete od nas očekivati?</h2>
        <p>Naš koncept tretman smjera da odmah riješi sve Vaše probleme, kao na primjer:</p>
        <ul>
			<li>zube koje nedostaju, probleme sa žvakanjem</li>
            <li>periodontalne probleme (upale desni)</li>
            <li>probleme sa tretmanima korijena zuba</li>
            <li>probleme sa razorenim ili sveobuhvatno rekonstruisanim zubima</li>
            <li>momentalna zamjena implantata, koji se zbog periiplantitis gube</li>           
        </ul>
        <p>Po pravilu svi ti problemi se mogu odjednom riješiti. Zubi se vade, implantati se ugradjuju i odmah  nakon toga počinje naš laboratorijski tim da Vaše nove zube pravi.</p>
        <p>Naše iskustvo, zahvaljujući hiljadama implantoloških operacija i posmatranjem toka tretmana preko 15 godina, jasno pokazuje da su implantati kod odraslih pacijenata mnogo
		pouzdaniji od njihovih „vlastitih zuba“. Mi ćemo analizirati Vašu situaciju u „ustima“ i ukazati na sve probleme.</p>
    </div>
    <div class="clear"></div>
</div>
    <div class="section" id="aboutSection_4">
        <h1>Certifikat</h1>
        <div class="certificates">
                <a href="img/pdf/CE_Certificate_Simpladent.pdf" class="fancybox cert" data-fancybox-group="cert" target="_blank">
                    <img src="img/about/certificate/CE_Certificate_Simpladent.png" alt="" />
                </a>
                    </div>
        <div class="article">
            <p>Mi primenjujemo izričito samo dentalne implantate sa CE sertifikatom, koji su proizvedeni u Švajcarskoj.</p>
        </div>
        <div class="clear"></div>
    </div>
    <div class="section" id="aboutSection_5">
        <h1>Izvještaji od pacijenata</h1>
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