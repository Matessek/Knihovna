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
				<form method="post" action="pridat/<?php echo $albumdata['gallery_id'];?>" enctype="multipart/form-data">
				<label for="upload" accept="image/*" onclick="document.getElementById('upload').click()">Přidat obrázky</label>
    			<input type="file" id="upload"  accept="image/*" name="images[]" multiple onchange="displayImages()">
				<div id="image-upload">
				</div>
				<button type="submit">Uložit</button>
				</form>
			</div>
		</div>
		<div id="myModal" class="modal-for-photo">
			<img id="modalImage" src="" alt="Full Screen Image">
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
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a  href="/admin/galerie"><?php echo $albumdata['name'];?></a>
						</li>
					</ul>
				</div>
                <div class="right">
                    <a href="#" class="btn-add-photos" id="add-photos">
                    <i class='bx bxs-bookmark-plus' ></i>
                        <span class="text">Přidat fotografie</span>
                    </a>
					<a href="#" class="btn-delete-photos" id="delete-photos" onclick="deleteSelected(<?php echo $albumdata['gallery_id']; ?>)">
                    <i class='bx bxs-trash-alt' ></i>
                        <span class="text">Smazat zatrhnuté</span>
                    </a>
                    <a href="/" class="btn-download">
                    <i class='bx bxs-home'></i>
                        <span class="text">Na Web</span>
                    </a>
                </div>
				
			</div>
			<button onclick="toggleCheckboxes()" class="btn-select-all">Označit vše/nic</button>
			<input type="checkbox" name="" id="" hidden>
			<ul class="gallery-detail">


			<?php
				$imagesNames = explode(',',$albumdata['image_links']);

				foreach($imagesNames as $name)
				{
					if($name != "")
					echo '<li><img onclick="openModal(this)" src="/Assets/img/uploads/'.$name.'" alt="placeholder">
								<input type="checkbox" name="'.$name.'" id="deleteCheckbox1"></li>';
				}
			?>
				
				
				
				
			</ul>


			
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="/Assets/js/dashboard.js"></script>
	<script src="/Assets/js/galleryDetail.js"></script>
</body>
</html>