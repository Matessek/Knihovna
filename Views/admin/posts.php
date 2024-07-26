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
							<a class="active" href="/admin/prispevky">Příspěvky</a>
						</li>
					</ul>
				</div>
                <div class="right">
                    <a href="#" class="btn-create" id="create-post">
                    <i class='bx bxs-bookmark-plus' ></i>
                        <span class="text">Vytvořit příspěvek</span>
                    </a>
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
						<h3><?php echo $sumViews ?></h3>
						<p>Zobrazení příspěvků</p>
					</span>
				</li>
				<li>
                    <i class='bx bxs-book' ></i>
					<span class="text">
						<h3>2543</h3>
						<p>Prokliků na katalog</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Příspěvky</h3>
						<input type="text" name="search" id="searchInput" onchange="filterSearch()" style="display: none;">
						<i onclick="showSearch()"  class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Název</th>
								<th>Datum</th>
                                <th>Autor</th>
								<th>Kategorie</th>
								<th>Počet zhlédnutí</th>
								<th style="text-align: center;">Detail</th>
							</tr>
						</thead>
						<tbody>
							<?php $tmp_id = 0;
									//  echo('<pre>');
									//  print_r($posts);
									//  print_r($views);
									//  echo('</pre>');
									foreach($posts as $p){
								?>
								<tr>
									<td><?php echo $p['title']; ?></td>
									<td><?php echo $p['event_date'] ?></td>
									<td><?php echo $p['author']; ?></td>
									<td><span class="status" style="background-color:<?php echo $p['category_color'] ?> ;"><?php echo $p['category_name'] ?></span></td>
									
									<td><?php echo $views[$tmp_id]->view_count;  $tmp_id++;?></td>
									<td><div class="detail-actions">
									<a target="_blank" href="/prispevek/<?php echo $p['post_id']; ?>"><span class="status completed">Zobrazit</span></a>
									<a href="/admin/prispevky/<?php echo $p['post_id']; ?>"><span class="status process">Upravit</span></a>
									</div></td> 
								</tr>
							<?php }?>
							
							
						</tbody>
					</table>
				</div>
				
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="/Assets/js/dashboard.js"></script>
	<script>

document.getElementById('searchInput').addEventListener('input', filterSearch);
function showSearch()
{
  var Sinput = document.getElementById('searchInput')

  if( Sinput.style.display == "none")
  {
    Sinput.style.display = "block";
  }
  else
  {
    Sinput.style.display = "none";
  }
}

function filterSearch() {
    // Získání hodnoty z vstupního pole
    const filterText = document.getElementById('searchInput').value.toLowerCase();

    // Selekce všech řádků tabulky
    const tableRows = document.querySelectorAll('.order tbody tr');

    // Procházení všech řádků a skrývání těch, které nevyhovují filtru
    tableRows.forEach(function(row) {
        const title = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
        if (title.includes(filterText)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}
	</script>
</body>
</html>