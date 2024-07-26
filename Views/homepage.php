



<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->

  <?php
    $maxCharacters = 80;
    foreach($all as $a)
    {
        if (strlen($a['content']) > $maxCharacters) {
          $trimmedContent = substr($a['content'], 0, $maxCharacters) . '...';
      } else {
          $trimmedContent = $a['content'];
      }
      $images = explode(',',$a['image_links']);
      echo '<div class="mySlides fade">
      <div class="post-slideshow-content">
      
      <h1>'.$a['title'].'</h1>
      <div class="trimmed-text">'.$trimmedContent.'</div>
      <button><a href="/prispevek/'.$a['post_id'].'">Více zde</a></button>
      </div>
              <img src="/Assets/img/uploads/'.$images[0].'" >
              
              </div>';
    }



?>

  <!-- <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="/Assets/img/profile/img1.jpg" style="width:100%">
    <div class="text">Caption Text</div>
  

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="/Assets/img/profile/img2.jpg" style="width:100%">
    <div class="text">Caption Two</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="/Assets/img/profile/img3.jpg" style="width:100%">
    <div class="text">Caption Three</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">4 / 3</div>
    <img src="/Assets/img/profile/img3.jpg" style="width:100%">
    <div class="text">Caption Three</div>
  </div> -->

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)"><i class='bx bxs-chevron-left' ></i></a>
  <a class="next" onclick="plusSlides(1)"><i class='bx bxs-chevron-right' ></i></a>


<!-- The dots/circles -->
<div class="rectangles" style="text-align:center">
    <?php
      //print_r($all);
      $tmp = 1;
      foreach($all as $a)
      {
        echo '<div class="rectangle" onclick="currentSlide('.$tmp.')"><h2>'.$a['title'].'</h2></div>';
        $tmp++;
      }
     ?>
    
</div>
</div>
<div class="rolling-news-container">
    <div class="rolling-news" id="rolling-news">
        <div class="text-content">
            <?php echo($sliderinfo['content']) ?>
        </div>
        <div class="text-content">
            <?php echo($sliderinfo['content']) ?>
        </div>
    </div>
</div>

<div class="information">
        <div class="left-section">
            <img src="/Assets/img/profile/library1.jpg" width="50%" alt="Library Image">
            <div class="about-short">

                <h1>Knihovna Bolatice</h1>

                <div class="filler" ></div>
                
                <?php

                    echo $about['content'];

                ?>

                
            <button class="more-btn"><a href="o-knihovne">Více</a></button> 
            </div>
        </div>
        <div class="right-section">
            <h1 style="text-align: center;">Otevírací doba</h1>
                <div class="book-container">
                    <div class="book" id="book1"><span class="name-day">PO</span><span class="open-hours"><?php echo $hours[0]; ?></span><span></span></div>
                    <div class="book" id="book2"><span class="name-day">ÚT</span><span class="open-hours"><?php echo $hours[1]; ?></span><span></span></div>
                    <div class="book" id="book3"><span class="name-day">ST</span><span class="open-hours"><?php echo $hours[2]; ?></span><span></span></div>
                    <div class="book" id="book4"><span class="name-day">ČT</span><span class="open-hours"><?php echo $hours[3]; ?></span><span></span></div>
                    <div class="book" id="book5"><span class="name-day">PÁ</span><span class="open-hours"><?php echo $hours[4]; ?></span><span></span></div>
                </div>
        </div>
</div>

<div class="posts">
<div class="articles-header">
    <h1>Poslední Příspěvky</h1>
</div>
<section class="articles">
<?php
   $maxCharacters = 80;
   foreach($all as $a)
   {
       if (strlen($a['content']) > $maxCharacters) {
         $trimmedContent = substr($a['content'], 0, $maxCharacters) . '...';
     } else {
         $trimmedContent = $a['content'];
     }
     $images = explode(',',$a['image_links']);

     echo '<article>
     <div class="article-wrapper">
       <figure>
         <img src="/Assets/img/uploads/'.$images[0].'" alt="" />
       </figure>
       <div class="article-body">
         <h2>'.$a['title'].'</h2>
         <p>
           '.$trimmedContent.'
         </p>
         <a href="prispevek/'.$a['post_id'].'" class="read-more">
         Číst více
           <i class=\'bx bx-right-arrow-circle icon\' ></i>
         </a>
       </div>
     </div>
   </article>';

    }


?>

</section>


  <!-- <article>
    <div class="article-wrapper">
      <figure>
        <img src="https://picsum.photos/id/1011/800/450" alt="" />
      </figure>
      <div class="article-body">
        <h2>This is some title</h2>
        <p>
          Curabitur convallis ac quam vitae laoreet. Nulla mauris ante, euismod sed lacus sit amet, congue bibendum eros. Etiam mattis lobortis porta. Vestibulum ultrices iaculis enim imperdiet egestas.
        </p>
        <a href="#" class="read-more">
        Číst více<span class="sr-only">about this is some title</span>
          <i class='bx bx-right-arrow-circle icon' ></i>
        </a>
      </div>
    </div>
  </article>
  <article>

    <div class="article-wrapper">
      <figure>
        <img src="https://picsum.photos/id/1005/800/450" alt="" />
      </figure>
      <div class="article-body">
        <h2>This is some title</h2>
        <p>
          Curabitur convallis ac quam vitae laoreet. Nulla mauris ante, euismod sed lacus sit amet, congue bibendum eros. Etiam mattis lobortis porta. Vestibulum ultrices iaculis enim imperdiet egestas.
        </p>
        <a href="#" class="read-more">
        Číst více<span class="sr-only">about this is some title</span>
          <i class='bx bx-right-arrow-circle icon' ></i>
        </a>
      </div>
    </div>
  </article>
  <article>

    <div class="article-wrapper">
      <figure>
        <img src="https://picsum.photos/id/103/800/450" alt="" />
      </figure>
      <div class="article-body">
        <h2>This is some title</h2>
        <p>
          Curabitur convallis ac quam vitae laoreet. Nulla mauris ante, euismod sed lacus sit amet, congue bibendum eros. Etiam mattis lobortis porta. Vestibulum ultrices iaculis enim imperdiet egestas.
        </p>
        <a href="#" class="read-more">
          Read more <span class="sr-only">about this is some title</span>
          <i class='bx bx-right-arrow-circle icon' ></i>
        </a>
      </div>
    </div>
  </article>
  </section> -->

</div>
<script src="/Assets/js/homepage.js"></script>