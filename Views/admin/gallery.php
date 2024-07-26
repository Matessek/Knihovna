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

		<div class="gallery-modal" id="gallery-modal">
			<div class="gallery-name-content">
			<i id="close-modal" class='bx bx-x' ></i>
				<form action="galerie/vytvorit-album" method="get">
				<label for="album-name">Název alba</label>
				<br>
				<input type="text" placeholder="Zadej jméno" name="album-name">
				<br>
				<button typ="submit">Vytvořit</button>
				</form>
			</div>
		</div>

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
							<a class="active" href="/admin/galerie">Galerie</a>
						</li>
					</ul>
				</div>
                <div class="right">
                    <a href="#" class="btn-add-album" id="create-album">
                    <i class='bx bxs-bookmark-plus' ></i>
                        <span class="text">Přidat album</span>
                    </a>
                    <a href="/" class="btn-download">
                    <i class='bx bxs-home'></i>
                        <span class="text">Na Web</span>
                    </a>
                </div>
				
			</div>

			<ul class="gallery-box">

				<?php
					foreach($albums as $a)
					{
						echo '<li><a href="/admin/galerie/'.$a['gallery_id'].'">
								<i class="bx bxs-group" ></i>
								<span class="text">
									<h3>'.$a['name'].'</h3>
								</span>
								</a>
							</li>';
					}


					?>
				
				
				
			</ul>


			
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	


	<script src="/Assets/js/gallery.js"></script>
		<script src="/Assets/js/dashboard.js">	</script>
</body>
</html>