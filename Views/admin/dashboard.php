
	<!-- CONTENT -->
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
							<a class="active" href="/admin/domu">Přehled</a>
						</li>
					</ul>
				</div>
				<div class="right">
					<a href="/" class="btn-download">
					<i class='bx bxs-home'></i>
						<span class="text">Na Web</span>
					</a>
				</div>
				
			</div>

			<ul class="box-info">
				
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2834</h3>
						<p>Návštěvníků</p>
					</span>
				</li>
				<li>
                    <i class='bx bxs-book' ></i>
					<span class="text">
						<h3><?php echo $clickCount ?></h3>
						<p>Prokliků na katalog</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Blízké akce</h3>
					</div>
					<table>
						<thead>
							<tr>
								<th>Název</th>
								<th>Datum</th>
								<th>Detail</th>
							</tr>
						</thead>
						<tbody>
							<?php
							
							foreach($Actions as $A )
							{

								$originalDate = $A['event_date'];
								$dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $originalDate);
								$newFormat = $dateTime->format('d.m.Y H:i');

								echo '<tr>
										<td>
											<p>'.$A['title'].'</p>
										</td>
										<td>'.$newFormat.'</td>
										<td><a href="prispevky/'.$A['post_id'].'"><span class="status completed">Zobrazit</span></a></td>
									</tr>';
							}
							




							?>
						</tbody>
					</table>
				</div>
				<div class="order">
					<div class="head">
						<h3>Poslední příspěvky</h3>
					</div>
					<table>
						<thead>
							<tr>
								<th>Autor</th>
								<th>Datum</th>
								<th>Detail</th>
							</tr>
						</thead>
						<tbody>

						<?php

						

							foreach($Posts as $A )
							{

								$originalDate = $A['event_date'];
								$dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $originalDate);
								$newFormat = $dateTime->format('d.m.Y H:i');

								echo '<tr>
										<td>
											<p>'.$A['title'].'</p>
										</td>
										<td>'.$newFormat.'</td>
										<td><a href="prispevky/'.$A['post_id'].'"><span class="status completed">Zobrazit</span></a></td>
									</tr>';
							}
							?>
							
							
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="/Assets/js/dashboard.js"></script>
</body>
</html>