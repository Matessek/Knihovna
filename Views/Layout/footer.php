

<footer class="footer">
  	 <div class="container">
  	 	<div class="row">
  	 		<div class="footer-col footer-col-cont">
  	 			<h4><a href="o-knihovne"><?php echo $cont['library_name'] ?></a></h4>
  	 			<ul>
  	 				<li><?php echo $cont['library_address'] ?></li>
  	 				<li><?php echo $cont['library_phone'] ?></li>
                    <li><?php echo $cont['library_email'] ?></li>
  	 			</ul>
  	 		</div>
  	 		
  	 		<div class="footer-col">
               <h4><a href="prispevky">Kategorie</a></h4>
  	 			<ul>
                    <?php
                     foreach($cat as $p)
                     {
                         echo '<li><a href="/prispevky/'.$p->category_id.'">'.$p->category_name.'</a></li>';
                     }
                    ?>
  	 				<!-- <li><a href="#">watch</a></li>
  	 				<li><a href="#">bag</a></li>
  	 				<li><a href="#">shoes</a></li>
  	 				<li><a href="#">dress</a></li> -->
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col footer-col-soc">
  	 			<h4>Sociální sítě</h4>
  	 			<div class="social-links">
  	 				<a href="https://www.instagram.com/knihovnabolatice/"><i class='bx bxl-instagram'></i></a><br>
  	 				<a href="https://www.facebook.com/mistni.knihovna.bolatice"><i class='bx bxl-facebook-circle' ></i></a>
  	 			</div>
  	 		</div>
            <div class="footer-col map">
  	 			<h4>Mapa</h4>
                <div class="map-frame">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1283.587498274516!2d18.079446227743304!3d49.95181971677567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4711604edba6037f%3A0xa805497c217c7339!2sM%C3%ADstn%C3%AD%20knihovna%20Bolatice!5e0!3m2!1scs!2scz!4v1708525130666!5m2!1scs!2scz" width="400" height="300" style="border:0;" allowfullscreen="" loading="async" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
  	 		</div>
  	 	</div>
  	 </div>
  </footer>