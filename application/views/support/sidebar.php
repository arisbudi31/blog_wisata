<div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">

        <div class="single-sidebar-widget post-category-widget">
            <h4 class="single-sidebar" style="font-size:20px;font-weight:700; margin-bottom:22px;">
                Kategori</h4>
            <ul class="cat-list mt-20">
                <?php foreach($kategori as $key => $value): ?>
                <li>
                    <a href="#" class="d-flex justify-content-between">
                        <p><?= $key ?></p>
                        <?php if ($value<10):  ?>
                        <p>(0<?= $value ?>)</p>
                        <?php else:  ?>
                        <p>(<?= $value ?>)</p>
                        <?php endif ?>
                    </a>
                </li>

                <?php endforeach ?>
            </ul>
        </div>

        <div class="single-sidebar-widget popular-post-widget">
            <h4 class="single-sidebar" style="font-size:20px;font-weight:700; margin-bottom:22px;">
                Popular Post</h4>
            <div class="popular-post-list">
                <?php foreach($populer as $key => $view): ?>
                <div class="single-post-list">
                    <div class="thumb">
                        <img class="card-img rounded-0" src="<?= $view['cover'] ?>" alt="">
                        <ul class=" thumb-info">
                            <li><a href="#"><?= $view['writer'] ?></a></li>
                            <li><a href="#"><?= date("Y-m-d", strtotime($view['date'])) ?></a></li>
                        </ul>
                    </div>
                    <div class="details mt-20">
                        <a href="blog-single.html">
                            <h6><?= $view['title'] ?></h6>
                        </a>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>

        <div class="single-sidebar-widget tag_cloud_widget">
            <h4 class="single-sidebar" style="font-size:20px;font-weight:700; margin-bottom:22px;">
                About Us</h4>
            <div class="col-md-16 text-center mb-1">
                <img src="assets/img/gallery/r1.jpg" alt="Image" class="img-fluid w-50 rounded-circle mb-4">
                <h2 class="text-black font-weight-light mb-4">Blog Wisata CiAyuMajaKuning</h2>
                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur
                    ab quas facilis obcaecati non ea, est odit repellat distinctio incidunt, quia
                    aliquam eveniet quod deleniti impedit sapiente atque tenetur porro?</p>
            </div>
        </div>
    </div>
</div>