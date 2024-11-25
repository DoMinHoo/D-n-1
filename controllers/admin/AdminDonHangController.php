<?php

class AdminDonHangController
{
    public $donHang;
    public $user;

    public function __construct()
    {
        $this->donHang = new donHangModel();
        $this->user = new UserModels();
    }

    public function getAllDonHang()
    {   
        $listDonHang = $this->donHang->getAllDonHang();
        if ($listDonHang) {
            require_once './views/admin/DonHang/listDonHang.php';
        }
    }
 
    public function detailDonHang()
    {
        $id = $_GET['id'];
        // var_dump($id);die;

        $detail = $this->donHang->detailDonHang($id);
        // var_dump($detail); die;
        // if($detail){
        require_once './views/admin/DonHang/editDonHang.php';
        require_once './views/admin/DonHang/detailDonHang.php';
        // }
    }

    public function editDonHang()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            // $dataUser = $this->user->getAllUser();
            // var_dump($dataUser); die();
            $edit = $this->donHang->getOneDonHang($id);
            require_once './views/admin/DonHang/editDonHang.php';
        }
    }

    public function postDonHang()
    {
        if (isset($_POST['editDonHang'])) {
            $error = [];
            
            $id = $_POST['id'];
            $user_id = $_POST['user_id'];
            $order_date = $_POST['order_date'];// var_dump($order_date); die;
            $status = $_POST['status'];
            $payment = $_POST['payment'];
            $total_amount = $_POST['total_amount'];
            $total_money = $_POST['total_money'];
            $shipping_address = $_POST['shipping_address'];
            $create_at = $_POST['create_at'];
            $update_at = $_POST['update_at'];
            if (empty($error)) {
                $this->donHang->editDonHang($id, $user_id, 
                $order_date, $status, 
                $payment, $total_amount, 
                $total_money, $shipping_address, $create_at, $update_at);
                header("Location: ?act=admin/donHang&message=success");
                
            }else{
                header("Location: ?act=admin/donHang&message=error");
            }
        }else{
            header("Location: ?act=admin/donHang&message=error.");
        }
    }
}
