<div class="posts-body">
    <div class="posts-header">
        <h1>Příspěvky - </h1>
        <?php
        foreach($cat as $c)
        {
          if($c->category_id == $customId)
          {
            echo '<a href="/prispevky" class="catButton" style="border: 2px solid '.$c->category_color.' ;color:'.$c->category_color.' ;background-color:var(--light-yellow);">'.$c->category_name.'</a>';
          }
          else
          {
            echo '<a href="/prispevky/'.$c->category_id.'" class="catButton" style="border: 2px solid '.$c->category_color.' ;background-color:'.$c->category_color.';">'.$c->category_name.'</a>';
          }
            
        }
        ?>
    </div>
    <div class="posts-all">
    
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
         <a href="/prispevek/'.$a['post_id'].'" class="read-more">
         Číst více
           <i class=\'bx bx-right-arrow-circle icon\' ></i>
           <i style="color:'.$a['category_color'].';" class=\' bx bxs-bookmark-alt flag\' ></i>
         </a>
       </div>
     </div>
   </article>';

    }


?>

</section>
    </div>
</div>
