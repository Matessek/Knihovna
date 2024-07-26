<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Knihovna Bolatice</title>
    <link rel="stylesheet" href="/Assets/css/homepageHeader.css">
    <link rel="stylesheet" href="/Assets/css/homepage.css">
    <link rel="stylesheet" href="/Assets/css/about.css">
    <link rel="stylesheet" href="/Assets/css/posts.css">
    <link rel="stylesheet" href="/Assets/css/footer.css">


    
</head>
<body>

<header>
<nav>
  <div class="wrapper">
    <div class="logo"><a href="/"><img src="/Assets/img/ZLUTA_MKB_RGB.png" width="60px" alt="logo"></a></div>
    <div id="catalog" class="logo"><a target="_blank" href="PresmerovaniKatalog"><img src="/Assets/img/profile/catalog.png"  width="200px" alt="logo"></a></div>
    <input type="radio" name="slider" id="menu-btn">
    <input type="radio" name="slider" id="close-btn">
    <ul class="nav-links">
      <label for="close-btn" class="btn close-btn"><i class='bx bx-menu'></i></label>
      <li><a href="/">Aktuality</a></li>
      <li>
        <a href="/o-knihovne" class="desktop-item">O knihovně</a>
        <input type="checkbox" id="showDrop">
        <label for="showDrop" class="mobile-item">O knihovně</label>
        <ul class="drop-menu">
          <li><a href="/o-knihovne/cenik">Ceník</a></li>
          <li><a href="#">Online katalog</a></li>
          <li><a href="#">Zajímavé odkazy</a></li>
        </ul>
      </li>
      <li>
        <a href="/prispevky" class="desktop-item">Příspěvky</a>
        <input type="checkbox" id="showDrop">
        <label for="showDrop" class="mobile-item">Příspěvky</label>
        <ul class="drop-menu">
            <?php
            //print_r($cat);
                foreach($cat as $p)
                {
                    echo '<li><a href="/prispevky/'.$p->category_id.'">'.$p->category_name.'</a></li>';
                }
            ?>
          
        </ul>
      </li>
      <li><a href="/galerie">Galerie</a></li>
      <li><a id="openModalBtn" href="#">Kontakty</a></li>
    </ul>
    <label for="menu-btn" class="btn menu-btn"><i class='bx bx-menu'></i></label>
  </div>
</nav>
</header>

<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close" id="closeModalBtn">&times;</span>
    <h2>Informace o knihovně</h2>
    <p><strong>Název:</strong><?php echo $cont['library_name'] ?></p>
    <p><strong>Adresa:</strong><?php echo $cont['library_address'] ?></p>
    <p><strong>Telefon:</strong><?php echo $cont['library_phone'] ?></p>
    <p><strong>WEB:</strong> <a href="http://knihovna.bolatice.cz" target="_blank">http://knihovna.bolatice.cz</a></p>
    <p><strong>E-mail:</strong> <a href="mailto:knihovna@bolatice.cz"><?php echo $cont['library_email'] ?></a></p>
    <p><strong>Kontaktní osoby:</strong><?php echo $cont['library_contacts_persons'] ?></p>
    <p><strong>Facebook:</strong> <a href="https://www.facebook.com/mistni.knihovna.bolatice" target="_blank"><?php echo explode(',',$cont['library_social_media'])[0]; ?></a></p>
    <p><strong>Instagram:</strong> <a href="https://www.instagram.com/knihovnabolatice/" target="_blank"><?php echo explode(',',$cont['library_social_media'])[1]; ?></a></p>
  </div>
</div>
<script>// Získání tlačítka a modálního okna
var openModalBtn = document.getElementById('openModalBtn');
var modal = document.getElementById('myModal');
var closeModalBtn = document.getElementById('closeModalBtn');

// Přidání posluchače událostí pro otevření modálního okna
openModalBtn.addEventListener('click', function() {
  modal.style.display = 'block';
});

// Přidání posluchače událostí pro zavření modálního okna
closeModalBtn.addEventListener('click', function() {
  modal.style.display = 'none';
});

// Přidání posluchače událostí pro zavření modálního okna při kliknutí mimo okno
window.addEventListener('click', function(event) {
  if (event.target == modal) {
    modal.style.display = 'none';
  }
});
</script>

