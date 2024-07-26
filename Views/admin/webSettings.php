<script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js">
</script>
<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<form action="#">
				<div class="form-input" style="display: none;">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			
			<a href="#" class="profile">
				<img src="/Assets/img/profile/man-person-icon.png">
			</a>
		</nav>
		<!-- NAVBAR -->
		
	
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Administrace Knihovny</h1>
					<ul class="breadcrumb">
						<li>
							<a href="/admin/domu">Administrace</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="/admin/galerie">Nastavení webu</a>
						</li>
						
					</ul>
				</div>
                <div class="right">
                    <a href="registrace" class="btn-register" >
                    <i class='bx bxs-bookmark-plus' ></i>
                        <span class="text">Registrovat nového uživatele</span>
                    </a>
                    <a href="/" class="btn-download">
                    <i class='bx bxs-home'></i>
                        <span class="text">Na Web</span>
                    </a>
                </div>
                
				
			</div>
            <div class="tab-container">
                <div class="tab">
                        <button class="tablinks" onclick="openCity(event, 'About')" id="defaultOpen"><span class="tab-text">O nás</span></button>
                        <button class="tablinks" onclick="openCity(event, 'OpeningHours')"><span class="tab-text">Otevírací doba</span></button>
                        <button class="tablinks" onclick="openCity(event, 'Contacts')"><span class="tab-text">Kontakty</span></button>
                        <button class="tablinks" onclick="openCity(event, 'Categories')"><span class="tab-text">Kategorie</span></button>
                </div>

                        <div id="About" class="tabcontent">
                        <h2>O Knihovně</h2>
                        <form action="?choose=about" method="post">
                        <div class="editor">
                                <textarea id="editor" name="content" class="post-content" style="width: max-content; height:250px;">
                                <?php if(isset($about)) echo ($about['content']);?>
                                </textarea>
                                <script>
                            ClassicEditor
                                        .create( document.querySelector( '#editor' ) )
                                        .catch( error => {
                                            console.error( error );
                                        } );
                                </script>
                
           
                            </div>
                            <button type="submit">Uložit</button>
                        </form>
                        </div>

                        <div id="OpeningHours" class="tabcontent">
                        <h3>Otevírací doba</h3>
                        <div class="opening-hours">
                            <form action="?choose=hours" method="post">
                            <h2>Otevírací doba knihovny</h2>
                            <div id="days-container">
                                <!-- Dny v týdnu -->
                                <div id="monday-day" class="day">Pondělí</div>
                                <div id="tuesday-day" class="day">Úterý</div>
                                <div id="wednesday-day" class="day">Středa</div>
                                <div id="thursday-day" class="day">Čtvrtek</div>
                                <div id="friday-day" class="day">Pátek</div>
                            </div>

                            <div id="hours-container">
                                <!-- Editor otevírací doby pro každý den -->
                                <div class="hours" id="monday-hours"><?php if(isset($hours)) echo ($hours[0]);?></div>
                                <div class="hours" id="tuesday-hours"><?php if(isset($hours)) echo ($hours[1]);?></div>
                                <div class="hours" id="wednesday-hours"><?php if(isset($hours)) echo ($hours[2]);?></div>
                                <div class="hours" id="thursday-hours"><?php if(isset($hours)) echo ($hours[3]);?></div>
                                <div class="hours" id="friday-hours"><?php if(isset($hours)) echo ($hours[3]);?></div>
                            </div>
                            <input type="text" value="<?php if(isset($hours)) echo ($hours[0]);?>" name="mo" id="imonday" hidden>
                            <input type="text" value="<?php if(isset($hours)) echo ($hours[1]);?>" name="tu" id="ituesday" hidden>
                            <input type="text" value="<?php if(isset($hours)) echo ($hours[2]);?>" name="we" id="iwednesday" hidden>
                            <input type="text" value="<?php if(isset($hours)) echo ($hours[3]);?>" name="th" id="ithursday" hidden>
                            <input type="text" value="<?php if(isset($hours)) echo ($hours[4]);?>" name="fr" id="ifriday" hidden>
                        </div>
                        <button type="submit">Uložit</button>
                        </form>
                        </div>

                        <div id="Contacts" class="tabcontent">
                        <h3>Kontakty</h3>
                        <form action="?choose=contact" method="post">
                        <div class="contact-form">
                            <div class="form-control">
                                <label for="name">Název Knihovny</label>
                                <input <?php if(isset($contact)) echo 'value="'.$contact['library_name'].'"';?> id="name" name="name" type="text">
                            </div>
                            <div class="form-control">
                                <label for="address">Adresa Knihovny</label>
                                <input <?php if(isset($contact)) echo 'value="'.$contact['library_address'].'"';?> id="address" name="address" type="text">
                            </div>
                            <div class="form-control">
                                <label for="phone">Telefonní číslo</label>
                                <input <?php if(isset($contact)) echo 'value="'.$contact['library_phone'].'"';?> id="phone" name="phone" type="text">
                            </div>
                            <div class="form-control">
                                <label for="email">Emailová adresa</label>
                                <input <?php if(isset($contact)) echo 'value="'.$contact['library_email'].'"';?> id="email" name="email" type="text">
                            </div>
            
                        </div>
                        <div class="contact-form" style="margin-top: 10px;">
                            <div class="form-control">
                                <label for="persons">Kontaktní osoby</label>
                                <textarea  id="persons" name="persons" rows="5"> <?php if(isset($contact)) echo $contact['library_contacts_persons'];?></textarea>
                            </div>
                            <div class="form-control">
                                <label for="social">Sociální sítě</label>
                                <textarea  id="social" name="social" rows="5"><?php if(isset($contact)) echo $contact['library_social_media'];?></textarea> 
                            </div>
                          
                            
                        </div>
                        <button type="submit">Uložit</button>
                        </form>
                                    
                        </div>
                        <div id="Categories" class="tabcontent">

                            <h3>Kategorie</h3>
                                <div id="category_list" class="category_list">
                                <?php 
                                    foreach ($categories as $cat) 
                                    {
                                        echo '<button style="background-color:'.$cat->category_color.';" onclick="fillForm(\''.$cat->category_name.'\', \''.$cat->category_color.'\','.$cat->category_id.')">'.$cat->category_name.'</button>';
                                    }
                                    ?>
                                    <button onclick="addNewCategory()">Přidat novou kategorii</button>
                                    </div>
                                    
                            <h3>Přidání kategorie</h3>

                             <form action="?choose=categories" method="post">
                                <input type="hidden" name="category_id" id="category_id" value="-1">

                                <label for="category_name">Název kategorie:</label>
                                <input type="text" name="category_name" id="category_name" required>

                                <label for="category_color">Barva kategorie:</label>
                                <input type="color" name="category_color" id="category_color" required>
                                    <br>
                                <button type="submit" class="SaveButton">Uložit</button>
                                </form>
                                <form id="deleteForm" action="?choose=categoriesDel" method="post">
                                    <input type="hidden" name="category_id" id="category_to_del" value="">
                                <button type="submit" class="DelButton" style="background-color: red;">Odebrat</button>
                                </form>
                        </div>
            </div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="/Assets/js/dashboard.js"></script>
    <script src="/Assets/js/webSettings.js"></script>

</body>
</html>