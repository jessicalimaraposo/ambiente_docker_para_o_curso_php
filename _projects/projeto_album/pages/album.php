

<main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Album example</h1>
          <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks dont simply skip over it entirely.</p>
          <p>
            <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
          </p>
        </div>
      </section>

    </main>
      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">

            <?php
            foreach($album_items as $item)
            {
            ?>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <a href="<?=SITE_URL ?>?page=album-item&item=<?=$item['id']?>">
                    <img class="card-img-top" src="<?=$item['image']?>" alt="Card image cap">
                </a>
                <div class="card-body">
                  <p class="card-text">"<?=$item['post']?>"</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="<?=SITE_URL ?>?page=album-item&item=<?=$item['id']?>">
                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      </a>
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

           <?php }?>

          </div>
        </div>
      </div>
