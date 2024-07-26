<link rel="stylesheet" href="/Assets/css/galleryPage.css">

<div class="posts-body">
    <h1>Album <?php echo $albs['name'] ?></h1>
    <div class="gallery-content">
<ul>
    <?php
	$thumbnails = explode(',',$albs['image_links']);
    foreach($thumbnails as $thumb)
    {
        
        if($thumb == '')
        {
            $thumb = "../ZLUTA_MKB_RGB.png";
        }
        echo '
        <li>
        <a href="#">
            <figure>
                <img src="/Assets/img/uploads/'.$thumb.'" alt="">
            </figure>
        </a>
        </li>
            ';
    }

	//<a href="" onclick="openLightbox(\'/Assets/img/uploads/' . $thumb . '\')">
  ?>
	
</ul>
</div>
</div>

<div id="lightbox-overlay" onclick="closeLightbox()">
  <div id="lightbox-content">
    <div id="lightbox-prev" onclick="changeImage(-1)">&#10094;</div>
    <img id="lightbox-image" src="" alt="">
    <div id="lightbox-next" onclick="changeImage(1)">&#10095;</div>
  </div>
</div>

<script>
  var currentImageIndex = 0;
  var images = <?php echo json_encode($thumbnails); ?>;

  function openLightbox(imageUrl) {
    currentImageIndex = images.indexOf(imageUrl);
    showImage();
    document.getElementById('lightbox-overlay').style.display = 'flex';
    document.getElementById('lightbox-content').style.display = 'block';
  }

  function closeLightbox() {
    document.getElementById('lightbox-overlay').style.display = 'none';
    document.getElementById('lightbox-content').style.display = 'none';
  }

  function changeImage(step) {
    currentImageIndex += step;
    showImage();
  }

  function showImage() {
    if (currentImageIndex < 0) {
      currentImageIndex = images.length - 1;
    } else if (currentImageIndex >= images.length) {
      currentImageIndex = 0;
    }

    document.getElementById('lightbox-image').src = '/Assets/img/uploads/' + images[currentImageIndex];
  }
</script>
