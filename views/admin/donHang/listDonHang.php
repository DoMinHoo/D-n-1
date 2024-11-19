<?php include_once './views/admin/layout/header.php'; ?>

<!-- Navbar -->
<?php include_once './views/admin/layout/navbar.php'; ?>

<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include_once './views/admin/layout/siderbar.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trang Admin Sản Phẩm</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Danh Sách Đơn Hàng </h3>
                
                            </div>
                            <!-- card header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>id_user</th>
                                            <th>order_date</th>
                                            <th>status</th>  
                                            <th>payment</th>
                                            <th>total_amount</th>
                                            <th>total_money</th>
                                            <th>shipping_address</th>
                                            <th>create_at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listDonHang as $value) { ?>
                                            <tr>
                                                <td aria-hidden><?= $value['id'] ?></td>
                                                <td><?= $value['user_id'] ?></td>   
                                                <td><?= $value['order_date'] ?></td>
                                                <td><?= $value['status'] == 0 ? 'Đang Chờ' : ($value['status'] == 1 ? 'Đang Giao Hàng' : 'Hoàn Thành'); ?></td>
                                                <td><?= $value['payment'] == 0? 'Thanh Toán Khi Nhận Hàng' : 'Thanh Toán Online' ?></td>
                                                <td><?= $value['total_amount'] ?></td>
                                                <td><?= $value['total_money'] ?></td>
                                                <td><?= $value['shipping_address'] ?></td>
                                                <td><?= $value['create_at'] ?></td>
                                                <td><a href="?act=admin/DonHang/edit&id=<?= $value['id']?>">Xem Chi Tiết</a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </section>
</div>

<?php include_once './views/admin/layout/footer.php'; ?>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  // Hàm hiển thị thông báo nổi
  function showNotification(message) {
    const notification = document.getElementById('notification');
    notification.textContent = message;
    notification.style.display = 'block';

    // Tự động ẩn thông báo sau 3 giây
    setTimeout(() => {
      notification.style.display = 'none';
    }, 3000);
  }

  // Kiểm tra URL để lấy thông báo
  const urlParams = new URLSearchParams(window.location.search);
  const message = urlParams.get('message');
  if (message) {
    showNotification(message);
  }
</script>