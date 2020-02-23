<?php

$album_item = ( isset($_GET['item']) && is_numeric($_GET['item']) ) 
    ? $_GET['item'] 
    : null;

 if($album_item)
 {
?>

 <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">

            <?php
            foreach($album_items as $item)
            {
                if($item['id'] == $album_item)
                {
            ?>
            <div class="col-md-6">
              <div class="card mb-6 box-shadow">
                <img class="card-img-top" src="<?=$item['image']?>" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">"<?=$item['post']?>"</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">
                        <i class="fa fa-share" aria-hidden="true"></i>
                      </button>
                    </div>
                    <small class="text-muted"><?=$item['likes']?> Likes
                    <i class="fa fa-heart" aria-hidden="true"></i>
                    </small>
                  </div>
                </div>
              </div>
            </div>

              <?php } 
              } ?>

          </div>
        </div>
      </div>
      <?php } ?>
