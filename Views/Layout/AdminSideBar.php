<?php

$currentURL = current_url();

// Rozdělení URL podle lomítek
$urlParts = explode('/', $currentURL);

// Odstranění prázdných hodnot v poli (vzniklých dvojitým lomítkem)
$urlParts = array_filter($urlParts);

// Získání poslední hodnoty v poli
$lastSegment = end($urlParts);
?>


<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="<?php echo base_url('admin/');?>" class="brand">
			<img src="/Assets/img/MODRA_MKB_RGB.png" alt="logo" class="logo-image">
			<span class="text">Knihovna Bolatice</span>
		</a>
		<ul class="side-menu top">
			<li class="<?php echo ($lastSegment == 'domu'?'active':''); ?>">
				<a href="<?php echo base_url('/admin/domu')?>">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Přehled</span>
				</a>
			</li>
			<li class="<?php echo ($lastSegment == 'prispevky'?'active':''); ?>">
				<a href="<?php echo base_url('/admin/prispevky')?>">
                <i class='bx bxs-bookmark' ></i>
					<span class="text">Příspěvky</span>
				</a>
			</li>
			<li class="<?php echo ($lastSegment == 'galerie'?'active':''); ?>">
				<a href="<?php echo base_url('/admin/galerie')?>">
                <i class='bx bxs-photo-album' ></i>
					<span class="text">Galerie</span>
				</a>
			</li>
			<li class="<?php echo ($lastSegment == 'statistiky'?'active':''); ?>">
				<a href="<?php echo base_url('/admin/statistiky')?>">
                <i class='bx bxs-photo-album' ></i>
					<span class="text">Návštěvnost</span>
				</a>
			</li>
			<li class="<?php echo ($lastSegment == 'nastaveni-webu'?'active':''); ?>">
				<a href="<?php echo base_url('/admin/nastaveni-webu')?>">
					<i class='bx bxs-group'></i>
					<span class="text">Nastavení webu</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url('admin/logout');?>" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Odhlásit se</span>
				</a>
			</li>
		</ul>
	</section>