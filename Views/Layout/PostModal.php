<script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js">
</script>

<div class="modal" id="post-modal">
<div class="modal-content">
<i id="close-modal" class='bx bx-x' ></i>

    <h2>{Akce} příspěvku</h2>
    <?php
// echo('<pre>');
// print_r($category);
// echo('</pre>');
    ?>
    
        <form method="post" action="/admin/ulozit-prispevek" enctype="multipart/form-data">
            <input type="hidden" value="<?php if(isset($post_data)) echo $post_data['post_id'];?>" name="post_id">
            <div class="modal-form">
                <div class="form-control">
                    <label for="title">Název</label>
                    <input <?php if(isset($post_data)) echo 'value="'.$post_data['title'].'"';?> id="title" name="title" type="text">
                </div>
                <div class="form-control">
                    <label for="date">Datum</label>
                    <input <?php if(isset($post_data)) echo 'value="'.$post_data['event_date'].'"';?> id="date" name="date" type="datetime-local">
                </div>
                <div class="form-control">
                    <label for="cost">Cena</label>
                    <input <?php if(isset($post_data)) echo 'value="'.$post_data['cost'].'"';?> id="cost" name="cost" type="text">
                </div>
                <div class="form-control">
                    <label for="place">Místo</label>
                    <input <?php if(isset($post_data)) echo 'value="'.$post_data['event_location'].'"';?> id="place" name="place" type="text">
                </div>
            
            </div>
            <div class="modal-form">
                <div class="form-control file">
                    <label for="thumbnail">Náhledový obrázek</label>
                    <button <?php
                    
                    if(isset($post_data)) 
                    {
                        $main_file = explode(',',$post_data['image_links'])[0];
                        echo 'style="background-image: url(\'/Assets/img/uploads/'. $main_file .'\');
                                                background-size:cover;
                                                background-position: center;"';


                    }
                    
                    ?> type="button" id="thumbnail" onclick="document.getElementById('getFile').click()">
                    <i class='bx bx-plus' ></i>
                    </button>
                    <input type='file' accept="image/*" id="getFile" name="main-image" style="display:none" onchange="displayImage('','')">
                </div>
                <div class="form-control">
                    <label for="category">Kategorie příspěvku</label>
                    <br>
                    <select name="category" id="category">
                        <?php foreach($cat as $c) 
                        {
                            echo '<option  value="'.$c->category_id.'"';
                            if(isset($category))
                            {
                                if($category->category_id == $c->category_id)
                                {
                                    echo ' selected ';
                                }
                            }
                           
                            
                            
                            echo' >'.$c->category_name.'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="modal-form" style="margin: 5px;">
            <label for="editor">Obsah příspěvku</label>
            </div>

            <div class="editor">
                    <textarea id="editor" name="content" class="post-content" style="width: max-content; height:250px;">
                    <?php if(isset($post_data)) echo ($post_data['content']);?>
                    </textarea>
                    <script>
                ClassicEditor
                            .create( document.querySelector( '#editor' ) )
                            .catch( error => {
                                console.error( error );
                            } );
                    </script>
                
           
            </div>

             <div class="modal-form" style="text-align: center;">
                <span class="thumbnails">Další foto</span>
             </div>                   
            <div class="modal-form">
                <div class="form-control more-photo">
                    
                    <?php
                    
                    if(isset($post_data)) 
                    {
                        $files = explode(',',$post_data['image_links']);

                        for($i = 1;$i<count($files);$i++)
                        {
                            echo '
                            <div class="new-photo">
                            <button ';
                             echo 'style="background-image: url(\'/Assets/img/uploads/'. $files[$i] .'\');
                             background-size:cover;
                             background-position: center;"';
                             echo '  type="button" id="thumbnail'.$i.'" onclick="document.getElementById(\'getFile'.$i.'\').click()">
                                        <i class=\'bx bx-plus\' ></i>
                                        </button>
                                        <input type=\'file\' accept="image/*" id="getFile'.$i.'" name="more-file" style="display:none" onchange="displayImage(\'getFile'.$i.'\',\'thumbnail'.$i.'\')">
                                        </div>';
                                    }

                       
                    }
                    
                    ?>
                   
                </div>  
                   
                    <div class="add-picture">
                    <button type="button" onclick="Add()"><i class='bx bx-plus'></i></button>
                    </div>
            </div>

            <div class="modal-form save-btn">
                    <button type="submit">Uložit    <i class='bx bxs-send' ></i></button>
                    <?php

                        if(isset($post_data))
                        {
                            echo '<button style="background-color:var(--red);" onclick="deletePost('.$post_data['post_id'].')"  type="button">Smazat   <i class=\'bx bxs-trash-alt\' ></i></button>';
                        }
                    ?>
            </div>

        </form>
    
   
</div>
</div>

<script>
function deletePost(id)
{
    window.location.href = "/admin/smazat/"+id;
}


 var modal_post = document.getElementById('post-modal');
    var displayModal = <?php echo isset($post_data) ? 'true' : 'false'; ?>;
    
    if (displayModal) {
        modal_post.style.display = 'block';
    } else {
        modal_post.style.display = 'none';
    }


        // Get the modal
var modal = document.getElementById("post-modal");

// Get the button that opens the modal
var btn = document.getElementById("create-post");

// Get the <span> element that closes the modal
var span = document.getElementById("close-modal");

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
  
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
  if(displayModal)
  {
    window.location.href = "/admin/prispevky"
  }
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    if(displayModal)
  {
    window.location.href = "/admin/prispevky"
  }
  }
}

        function displayImage(name,thumbnail) {
            console.log(name,thumbnail);
            if(name == '')
            {
                const thumbnailInput = document.getElementById('getFile');
                const uploadBtn = document.getElementById('thumbnail');

                if (thumbnailInput.files && thumbnailInput.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        uploadBtn.style.backgroundImage = `url('${e.target.result}')`;
                        uploadBtn.style.backgroundSize = 'cover';
                        uploadBtn.style.backgroundPosition = 'center';
                    };

                    reader.readAsDataURL(thumbnailInput.files[0]);
                }
            }
            else
            {
                const thumbnailInput = document.getElementById(name);
                const uploadBtn = document.getElementById(thumbnail);

                if (thumbnailInput.files && thumbnailInput.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        uploadBtn.style.backgroundImage = `url('${e.target.result}')`;
                        uploadBtn.style.backgroundSize = 'cover';
                        uploadBtn.style.backgroundPosition = 'center';
                    };

                    reader.readAsDataURL(thumbnailInput.files[0]);
                }
            }
            
        }
        let counter = 1;

        function Add()
        {
            counter++;

            const newPhotoContainer = document.createElement('div');
            newPhotoContainer.className = 'new-photo';

            const newButton = document.createElement('button');
            newButton.type = 'button';
            newButton.id = `thumbnail${counter}`;
            newButton.onclick = function() {
                document.getElementById(`getFile${counter}`).click();
            };

            const newIcon = document.createElement('i');
            newIcon.className = 'bx bx-plus';

            const newInput = document.createElement('input');
            newInput.type = 'file';
            newInput.id = `getFile${counter}`;
            newInput.name = `more-file${counter}`;
            newInput.style.display = 'none';

            newInput.onchange = function()
            {
                displayImage(newInput.id,newButton.id);
            }



            newButton.appendChild(newIcon);
            newPhotoContainer.appendChild(newButton);
            newPhotoContainer.appendChild(newInput);

            document.querySelector('.more-photo').appendChild(newPhotoContainer);
        }

      
    
    </script>