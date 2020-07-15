<?php $this->load->view('support/header'); ?>
<main class="site-main">
    <!--================Hero Banner start =================-->
    <section class="mb-30px">
        <div class="container">
            <div class="hero-banner">
                <div class="hero-banner__content">
                    <h3>Wisata CiAyuMajaKuning</h3>
                    <h1>Cirebon, Indramayu, Majalengka, Kuningan</h1>
                    <h4>Blog yang memuat informasi untuk referensi liburan akhir tahun anda di sekitar wilayah III
                        Cirebon</h4>
                </div>
            </div>
        </div>
    </section>
    <!--================Hero Banner end =================-->

    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php foreach($content as $key => $isi): ?>
                    <div class="single-recent-blog-post" name=1 id=1 $value=1>
                        <div class="thumb">
                            <img class="img-fluid" src="<?= $isi['cover'];  ?>" alt="">
                            <ul class="thumb-info">
                                <li><a href="#"><i class="ti-user"></i><?= $isi['writer'];  ?></a></li>
                                <li><a href="#"><i class="ti-notepad"></i><?= $isi['date'];  ?></a></li>
                                <li><a href="#"><i class="ti-eye"></i><?php if ($isi['views']<10):  ?>
                                        0<?= $isi['views'] ?>
                                        <?php else:  ?>
                                        <?= $isi['views'] ?>
                                        <?php endif ?></a>
                                </li>
                            </ul>
                        </div>
                        <div class="details mt-20">
                            <a href="<?= $isi['url'];  ?>">
                                <h3><?= $isi['title'];  ?></h3>
                            </a>
                            <p class="tag-list-inline">Tag: <a href="#">travel</a>, <a href="#">life style</a>, <a
                                    href="#">technology</a>, <a href="#">fashion</a></p>
                            <p><?= $isi['content'];  ?></p>
                            <a class="button" href="#">Read More <i class="ti-arrow-right"></i></a>
                        </div>
                    </div>
                    <?php endforeach ?>


                    <div class="row">
                        <div class="col-lg-12">
                            <nav class="blog-pagination justify-content-center d-flex">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Previous">
                                            <span aria-hidden="true">
                                                <i class="ti-angle-left"></i>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Next">
                                            <span aria-hidden="true">
                                                <i class="ti-angle-right"></i>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Start Blog Post Siddebar -->
                <?php $this->load->view('support/sidebar'); ?>
            </div>
            <!-- End Blog Post Siddebar -->
        </div>
    </section>
    <!--================ End Blog Post Area =================-->
</main>
<?php $this->load->view('support/footer'); ?>