<section class="home-banner-area img-fluid" style="background-image: url('<?= base_url("uploads/system/".get_frontend_settings('banner_image')); ?>');
        background-position: center center;
        background-size: cover;
        background-repeat: no-repeat;
        padding: 170px 0 130px;
        color: #fff;
		">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <div class="home-banner-wrap">
                    <h2><?php echo get_frontend_settings('banner_title'); ?></h2>
                    <p><?php echo get_frontend_settings('banner_sub_title'); ?></p>
                    <form class="" action="<?php echo site_url('home/search'); ?>" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name = "query" placeholder="Apa yang ingin kamu pelajari?">
                            <div class="input-group-append">
                                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="home-fact-area">
    <div class="container-lg">
        <div class="row">
            <?php $courses = $this->crud_model->get_courses(); ?>
            <div class="col-md-4 d-flex">
                <div class="home-fact-box mr-md-auto mr-auto">
                    <i class="fas fa-bullseye float-left"></i>
                    <div class="text-box">
                        <h4><?php
                        $status_wise_courses = $this->crud_model->get_status_wise_courses();
                        $number_of_courses = $status_wise_courses['active']->num_rows();
                        echo $number_of_courses.' Kelas Online' ?></h4>
                        <p>Cari kelas yang kamu inginkann</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex">
                <div class="home-fact-box mr-md-auto mr-auto">
                    <i class="fa fa-check float-left"></i>
                    <div class="text-box">
                        <h4>Belajar lebih insentif</h4>
                        <p>Belajar live streaming dengan pengajar berpengalaman. Materi dapat diulang kembali kapan saja dan dimana saja.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex">
                <div class="home-fact-box mr-md-auto mr-auto">
                    <i class="fa fa-clock float-left"></i>
                    <div class="text-box">
                        <h4>Tentukan sendiri waktu belajar</h4>
                        <p>Belajar live streaming dengan pengajar berpengalaman. Materi dapat diulang kembali kapan saja dan dimana saja.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="course-carousel-area">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <h2 class="course-carousel-title">Kelas Favorit</h2>
                <div class="course-carousel">
                    <?php $top_courses = $this->crud_model->get_top_courses()->result_array();
                    $cart_items = $this->session->userdata('cart_items');
                    foreach ($top_courses as $top_course):?>
                    <div class="course-box-wrap">
                        <a href="<?php echo site_url('home/course/'.rawurlencode(slugify($top_course['nm_class'])).'/'.$top_course['id_class']); ?>" class="has-popover">
                            <div class="course-box">
                                <!-- <div class="course-badge position best-seller">Best seller</div> -->
                                <div class="course-image">
                                    <img src="<?php echo $this->crud_model->get_course_thumbnail_url($top_course['id_class']); ?>" alt="" class="img-fluid">
                                </div>
                                <div class="course-details">
                                    <h5 class="title"><?php echo $top_course['nm_class']; ?></h5>
                                    <p class="instructors"><?php echo strip_tags($top_course['desc_class']); ?></p>
                                    <div class="rating">
                                        <?php
                                        /* $total_rating =  $this->crud_model->get_ratings('course', $top_course['id'], true)->row()->rating;
                                        $number_of_ratings = $this->crud_model->get_ratings('course', $top_course['id'])->num_rows();
                                        if ($number_of_ratings > 0) {
                                            $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                                        }else {
                                            $average_ceil_rating = 0;
                                        } */
$average_ceil_rating = 5;
                                        for($i = 1; $i < 6; $i++):?>
                                        <?php if ($i <= $average_ceil_rating): ?>
                                            <i class="fas fa-star filled"></i>
                                        <?php else: ?>
                                            <i class="fas fa-star"></i>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                    <span class="d-inline-block average-rating"><?php echo $average_ceil_rating; ?></span>
                                </div>
                                <?php if ($top_course['discount_price'] == 0): ?>
                                    <p class="price text-right"><?php echo 'Gratis' ?></p>
                                <?php else: ?>
                                    <?php if ($top_course['discount'] <> 0): ?>
                                        <p class="price text-right"><small><?php echo currency($top_course['price']); ?></small><?php echo currency($top_course['discount_price']); ?></p>
                                    <?php else: ?>
                                        <p class="price text-right"><?php echo currency($top_course['discount_price']); ?></p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </a>

                    <div class="webui-popover-content">
                        <div class="course-popover-content">
                            
                            <div class="course-title">
                                
                            </div>
                            <div class="course-meta">
                                <span class=""><i class="fas fa-play-circle"></i>
                                    
                                </span>
                                <span class=""><i class="far fa-clock"></i>
                                    
                                </span>
                                <span class=""><i class="fas fa-closed-captioning"></i></span>
                            </div>
                            <div class="course-subtitle"></div>
                            <div class="what-will-learn">
                                <ul>
                                   
                            </ul>
                        </div>
                        <div class="popover-btns">
                            

                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>
</div>
</section>


<script type="text/javascript">
function handleWishList(elem) {

    $.ajax({
        url: '<?php echo site_url('home/handleWishList');?>',
        type : 'POST',
        data : {course_id : elem.id},
        success: function(response)
        {
            if (!response) {
                window.location.replace("<?php echo site_url('login'); ?>");
            }else {
                if ($(elem).hasClass('active')) {
                    $(elem).removeClass('active')
                }else {
                    $(elem).addClass('active')
                }
                $('#wishlist_items').html(response);
            }
        }
    });
}

function handleCartItems(elem) {
    url1 = '<?php echo site_url('home/handleCartItems');?>';
    url2 = '<?php echo site_url('home/refreshWishList');?>';
    $.ajax({
        url: url1,
        type : 'POST',
        data : {course_id : elem.id},
        success: function(response)
        {
            $('#cart_items').html(response);
            if ($(elem).hasClass('addedToCart')) {
                $('.big-cart-button-'+elem.id).removeClass('addedToCart')
                $('.big-cart-button-'+elem.id).text("Tambahkan ke keranjang");
            }else {
                $('.big-cart-button-'+elem.id).addClass('addedToCart')
                $('.big-cart-button-'+elem.id).text("Berhasil ditambahkan ke keranjang");
            }
            $.ajax({
                url: url2,
                type : 'POST',
                success: function(response)
                {
                    $('#wishlist_items').html(response);
                }
            });
        }
    });
}

function handleEnrolledButton() {
    $.ajax({
        url: '<?php echo site_url('home/isLoggedIn');?>',
        success: function(response)
        {
            if (!response) {
                window.location.replace("<?php echo site_url('login'); ?>");
            }
        }
    });
}

$(document).ready(function(){
    if(! /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        if($(window).width() >= 840){
            $('a.has-popover').webuiPopover({
                trigger:'hover',
                animation: 'pop',
                placement:'horizontal',
                delay: {
                    show: 100,
                    hide: null
                },
                width: 330
            });
        }else{
            $('a.has-popover').webuiPopover({
                trigger:'hover',
                animation: 'pop',
                placement:'vertical',
                delay: {
                    show: 100,
                    hide: null
                },
                width: 335
            });
        }
    }
});
</script>
