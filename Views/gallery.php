<link rel="stylesheet" href="/Assets/css/galleryPage.css">

<div class="posts-body">
    <h1>Galerie</h1>
    <div class="gallery-content">
<ul>
    <?php
    foreach($albs as $a)
    {
        $thumbnail = explode(',',$a['image_links'])[0];
        if($thumbnail == '')
        {
            $thumbnail = "../ZLUTA_MKB_RGB.png";
        }
        echo '
        <li>
        <a href="galerie/album/'.$a['gallery_id'].'">
            <figure>
                <img src="/Assets/img/uploads/'.$thumbnail.'" alt="">
                <figcaption>'.$a['name'].'</figcaption>
            </figure>
        </a>
        </li>
            ';
    }
  ?>
	<li>
		<a href="">
			<figure>
				<img src='https://images.unsplash.com/photo-1631451095765-2c91616fc9e6?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxNDU4OXwwfDF8cmFuZG9tfHx8fHx8fHx8MTYzNDA0OTI3Nw&ixlib=rb-1.2.1&q=80&w=400' alt='Volcano and lava field against a stormy sky'>
				<figcaption>Mountains and volcanos</figcaption>
			</figure>
		</a>
	</li>
	<li>
		<a href="">
			<figure>
				<img src='https://images.unsplash.com/photo-1633621533308-8760aefb5521?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxNDU4OXwwfDF8cmFuZG9tfHx8fHx8fHx8MTYzNDA1MjAyMQ&ixlib=rb-1.2.1&q=80&w=400' alt='Guy on a bike ok a wooden bridge with a forest backdrop'>
				<figcaption>Adventure getaways</figcaption>
			</figure>
		</a>
	</li>
	<li>
		<a href="">
			<figure>
				<img src='https://images.unsplash.com/photo-1633635146842-12d386e64058?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxNDU4OXwwfDF8cmFuZG9tfHx8fHx8fHx8MTYzNDA1MjA5OA&ixlib=rb-1.2.1&q=80&w=400' alt='Person standing alone in a misty forest'>
				<figcaption>Forest escapes</figcaption>
			</figure>
		</a>
	</li>
	<li>
		<a href="">
			<figure>
				<img src='https://images.unsplash.com/photo-1568444438385-ece31a33ce78?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxNDU4OXwwfDF8cmFuZG9tfHx8fHx8fHx8MTYzNDA1MjA5OA&ixlib=rb-1.2.1&q=80&w=400' alt='Person hiking on a trail through mountains while taking a photo with phone'>
				<figcaption>Hiking trails</figcaption>
			</figure>
		</a>
	</li>
	<li>
		<a href="">
			<figure>
				<img src='https://images.unsplash.com/photo-1633515257379-5fda985bd57a?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxNDU4OXwwfDF8cmFuZG9tfHx8fHx8fHx8MTYzNDA1MjA5OA&ixlib=rb-1.2.1&q=80&w=400' alt='Street scene with person walking and others on motorbikes, all wearing masks'>
				<figcaption>Street scenes</figcaption>
			</figure>
		</a>
	</li>
	<li>
		<a href="">
			<figure>
				<img src='https://images.unsplash.com/photo-1633209931146-260ce0d16e22?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxNDU4OXwwfDF8cmFuZG9tfHx8fHx8fHx8MTYzNDA1MjA5OA&ixlib=rb-1.2.1&q=80&w=400' alt='Fashionable-looking girl with blond hair and pink sunglasses'>
				<figcaption>Trending</figcaption>
			</figure>
		</a>
	</li>
</ul>
</div>
</div>

<script>

</script>
