<div class="post-detail-body">
    <div class="post-detail-header">
        <h1><?php echo $all['title']  ?></h1>
        <span style="background-color: var(--red);">Cena :<?php echo $all['cost'] ?></span>
        <span style="background-color: var(--green);"><?php echo $all['event_date'] ?></span>
        <span style="background-color: var(--orange);"><?php echo $all['event_location'] ?></span>
    </div>
    <div class="post-detail-container">
      
        
  <div class="post-detail">
  <br>
  <?php echo $all['content'] ?>
    <div class="images">
        <?php
        $images = explode(",",$all['image_links']);
        foreach($images as $image)
        {
            if($image != "")
            {
                echo '<img width="200px" src="/Assets/img/uploads/'.$image.'" alt="Image 1" onclick="openLightbox(\'/Assets/img/uploads/'.$image.'\')">';
            }
           // echo '<img width="200px" src="/Assets/img/uploads/'.$image.'" alt="Image 1" onclick="openLightbox(/Assets/img/uploads/'.$image.')">';
            

        }

        ?>
      
      <div class="lightbox-overlay" id="lightbox-overlay" onclick="closeLightbox()"></div>
  <div class="lightbox-content" id="lightbox-content">
    <img src="" alt="Lightbox Image" id="lightbox-image">
    <span class="prev" onclick="changeImage(-1)">&#10094;</span>
    <span class="next" onclick="changeImage(1)">&#10095;</span>
    <span class="close" onclick="closeLightbox()">&times;</span>
  </div>
    </div>
   
  </div>
</div>
</div>

<script>
let currentIndex = 0;

function openLightbox(imageSrc) {
  document.getElementById('lightbox-image').src = imageSrc;
  currentIndex = getImageIndex(imageSrc);
  document.getElementById('lightbox-overlay').style.display = 'block';
  document.getElementById('lightbox-content').style.display = 'block';
}

function closeLightbox() {
  document.getElementById('lightbox-overlay').style.display = 'none';
  document.getElementById('lightbox-content').style.display = 'none';
}

function changeImage(offset) {
  currentIndex += offset;
  const images = document.querySelectorAll('.images img');
  if (currentIndex >= images.length) {
    currentIndex = 0;
  } else if (currentIndex < 0) {
    currentIndex = images.length - 1;
  }
  const newImageSrc = images[currentIndex].src;
  document.getElementById('lightbox-image').src = newImageSrc;
}

function getImageIndex(imageSrc) {
  const images = document.querySelectorAll('.images img');
  for (let i = 0; i < images.length; i++) {
    if (images[i].src === imageSrc) {
      return i;
    }
  }
  return 0;
}

document.addEventListener('keydown', function (e) {
  if (document.getElementById('lightbox-content').style.display === 'block') {
    if (e.key === 'ArrowLeft') {
      changeImage(-1);
    } else if (e.key === 'ArrowRight') {
      changeImage(1);
    } else if (e.key === 'Escape') {
      closeLightbox();
    }
  }
});
</script>
