<?php
include "header.php";
?>
<!-- News With Sidebar Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <?php
                    if (isset($_GET['cate-id'])):
                        $cate_id = $_GET['cate-id'];
                        //hiển thị 2 sản phẩm trên 1 trang
                        $count = 2;
                        //lấy số trang trên thanh địa chỉ
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        //tính tổng số dòng, ví dụ kết quả là 18
                        $total = count($item->getAllItemByCate($cate_id));
                        //lấy đường dẫn đến file hiện hình
                        $url = $_SERVER['PHP_SELF'] . "?cate-id=" . $cate_id;
                    ?>
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">Category: <?php echo $total; ?></h4>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                            </div>
                        </div>
                        <?php
                        $getItemByCate = $item->getItemByCate($cate_id, $page, $count);
                        foreach ($getItemByCate as $value):
                        ?>
                            <div class="col-lg-6">
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="<?php echo $value['image'] ?>" style="object-fit: cover;">
                                    <div class="bg-white border border-top-0 p-4">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">Business</a>
                                            <a class="text-body" href=""><small><?php echo $value['created_at'] ?></small></a>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href=""><?php echo $value['title'] ?></a>
                                        <p class="m-0"><?php echo $value['excerpt'] ?></p>
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle mr-2" src="<?php echo $value['image'] ?>" width="25" height="25" alt="">
                                            <small>John Doe</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small>
                                            <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php endforeach;
                    endif ?>
                </div>
            </div>

            <div class="col-lg-4">
                <?php include 'social-sidebar.php' ?>
            </div>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->


<?php
include "footer.php" ?>