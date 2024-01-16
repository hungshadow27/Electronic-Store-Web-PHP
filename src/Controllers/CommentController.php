<?php
require "./src/Models/UserModel.php";
require "./src/Models/CommentModel.php";
class CommentController
{
    use Controller;
    public function index($productId = '', $b = '', $c = '')
    {
        if (!isset($_SESSION['USER'])) {
            redirect('login');
            exit;
        }
        if ($productId == '' || !isset($_POST['content'])) {
            redirect('_404');
            exit;
        }
        $content  = $_POST['content'];
        $user = new UserEntity();
        $user = unserialize($_SESSION['USER']);
        $commentModel = new CommentModel;
        $currentDateTime = getCurrentDateTime();
        $commentModel->createNewComment($productId, $user->getId(), -1, $content, $currentDateTime);
        echo "<script>alert('Bạn đã thêm bình luận thành công!');
            window.location.replace('" . ROOT . "/productdetail/" . $productId . "');
            </script>";
    }
    public function reply($a = '', $b = '', $c = '')
    {
        if (!isset($_SESSION['USER'])) {
            redirect('login');
            exit;
        }
        if (!isset($_GET['product_id']) || !isset($_GET['comment_id']) || !isset($_POST['content'])) {
            redirect('_404');
            exit;
        }
        $productId = $_GET['product_id'];
        $commentId = $_GET['comment_id'];
        $content  = $_POST['content'];
        $user = new UserEntity();
        $user = unserialize($_SESSION['USER']);
        $commentModel = new CommentModel;
        $currentDateTime = getCurrentDateTime();
        $commentModel->createNewComment($productId, $user->getId(), $commentId, $content, $currentDateTime);
        echo "<script>alert('Bạn đã thêm bình luận thành công!');
            window.location.replace('" . ROOT . "/productdetail/" . $productId . "');
            </script>";
    }
}
