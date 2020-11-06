<?= $this->extend('site/layout_header') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?php echo base_url() ?>/admin/dist/css/adminlte.min.css">
<?php 

function tomtat($str){

    echo  (substr($str,0,50).".....");
}
function vn_to_str ($str){
 
    $unicode = array(
     
    'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
     
    'd'=>'đ',
     
    'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
     
    'i'=>'í|ì|ỉ|ĩ|ị',
     
    'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
     
    'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
     
    'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
     
    'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
     
    'D'=>'Đ',
     
    'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
     
    'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
     
    'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
     
    'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
     
    'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
     
    );
     
    foreach($unicode as $nonUnicode=>$uni){
     
    $str = preg_replace("/($uni)/i", $nonUnicode, $str);
     
    }
    $str = str_replace(' ','-',$str);
     
echo $str;
     
    }
?>
<div class="col-12 col-lg-8">
                    <div class="post-content-area mb-50">
                    <div class="world-catagory-area">
                          
                          <ul class="nav nav-tabs" id="myTab" role="tablist">

                              <li class="title"><?= $tenchude ?></li>

                    

                    </ul>




                           
                    <?php foreach($allbaiviet as $values) :?>
                    <!-- Single Blog Post -->
                    <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img src="<?php echo base_url() ?>/<?= $values->anh ?>" alt="">
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <a href="<?php echo base_url() ?>/baiviet/<?= $values->id ?>-<?= vn_to_str($values->tenkhoahoc)?>" class="headline">
                                <h5><?= $values->tenkhoahoc ?>h5>
                            </a>
                            <p><?= tomtat($values->noidung )?>...</p>
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <p><a href="#" class="post-author">Cập Nhật</a> on <a href="#" class="post-date"><?= $values->thoigian ?></a></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ;?>

                    <?php if($pagi>0)  :?>
                    <div class="world-catagory-area" style="margin-left: 30%;margin-top:10px;">
                    <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>

                        <?php for($i=$pagi;$i>0;$i--)  :?>

                            <?php if($page==$i)  :?>

                                <li class="page-item active">
                            <a class="page-link" href="<?php echo base_url() ?>/<?php echo uri_string(); ?>"><?= $i ?> <span class="sr-only">(current)</span></a>
                            </li>
                    
                        <?php else :?>
                        <li class="page-item"><a class="page-link" href="<?php  echo base_url() ?>/chude/<?= $allbaiviet[0]->id_chude  ?>-<?= vn_to_str($tenkhoahoc)?>"><?= $i ?></a></li>
                        <?php endif ;?>
                        <?php endfor  ;?>
                        <li class="page-item">
                        <a class="page-link" onclick="cong(page=<?= $page ?>)">Next</a>
                        </li>
                    </ul>
                    </nav>
                    </div>
                    <?php endif ;?>

<script>
function cong(page){

    window.location="<?php   echo base_url()."/chude/";echo $allbaiviet[0]->id_chude."-";vn_to_str($tenchude) ?>/"+(page+1);
}

</script>


                    </div>

 
                  

                    </div>
                </div>


<?= $this->endSection() ?>
<?= $this->extend('site/layout_header') ?>
<?= $this->section('baiviet') ?>
<div class="world-latest-articles">
            <div class="row">
                <div class="col-12 col-lg-8" id="xemthem">
                    <div class="title">
                        <h5>Bài Viết Có Liên Quan</h5>
                    </div>
                
                    <?php foreach($allbaiviet as $values) :?>
                    <!-- Single Blog Post -->
                    <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img src="<?php echo base_url() ?>/<?= $values->anh ?>" alt="">
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <a href="<?php echo base_url() ?>/baiviet/<?= $values->id ?>-<?= vn_to_str($values->tenkhoahoc)?>" class="headline">
                                <h5><?= $values->tenkhoahoc ?>h5>
                            </a>
                            <p><?= tomtat($values->noidung )?>...</p>
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <p><a href="#" class="post-author">Cập Nhật</a> on <a href="#" class="post-date"><?= $values->thoigian ?></a></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ;?>

                
                </div>

                <div class="col-12 col-lg-4">
                    <div class="title">
                        <h5>Liên Kết</h5>
                    </div>

                    <!-- Single Blog Post -->
                    <div class="single-blog-post wow fadeInUpBig" data-wow-delay="0.2s">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img src="<?php echo base_url() ?>/uploads/images/facebook.png" alt="">
                            <!-- Catagory -->
                            <div class="post-cta" style="color: red;"><a href="#">Facebook</a></div>
                            <!-- Video Button -->
                            <a href="https://www.facebook.com/groups/2756911741219784" ></a>
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <a href="https://www.facebook.com/groups/2756911741219784" class="headline">
                                <h5>Tham Gia Nhóm Chia sẻ Khóa Học Để Có Thông Tin Mới Nhất Về Các Khóa Học</h5>
                            </a>

                        </div>
                    </div>

                    <!-- Single Blog Post -->
                    <div class="single-blog-post wow fadeInUpBig" data-wow-delay="0.4s">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img src="<?php echo base_url() ?>/img/blog-img/b8.jpg" alt="">
                            <!-- Catagory -->
                            <div class="post-cta"><a href="#">travel</a></div>
                            <!-- Video Button -->
                            <a href="https://www.youtube.com/watch?v=IhnqEwFSJRg" class="video-btn"><i class="fa fa-play"></i></a>
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <a href="#" class="headline">
                                <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                            </a>
                            <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        
        <!-- Load More btn -->
        <div class="row" id="load">
            <div class="col-12">
                <div class="load-more-btn mt-50 text-center">
                    <button onclick="xemthem()" class="btn world-btn">Xem Thêm</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>