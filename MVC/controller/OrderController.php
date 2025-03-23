<?php
// c:\xampp\htdocs\BookSmart\BookShop\MVC\controller\OrderController.php

class OrderController extends Controller
{
    private $orderRepository = null;
    public $userRepository = null;


    public function __construct()
    {
        parent::__construct();
        $this->orderRepository = new OrderRepository();
        $this->userRepository = new userRepository();

    }

   


    public function list()
    {
        // 1. Get all orders
        $orders = $this->orderRepository->list();
        $data = ['orders' => $orders];
        $this->show('view/order/list', $data); // 'view/order/list' is our new view file
    }
    public function orderHistory()
    {
        if (!isset($_SESSION['user'])) {
            // Handle case where user is not logged in (e.g., redirect to login)
            $this->setError(['alert' => messenger('You need to log in to view your order history.', 'warning')]);
            redirect(href('user', 'login'));
            return; // Stop further execution
        }

        $userId = $_SESSION['user']['id'];
        $orders = $this->orderRepository->getOrdersByUserId($userId);
        $orderDetails = [];
        foreach ($orders as $order) {
            $orderDetails[$order->getId()] = $this->orderRepository->getOrderDetailsByOrderId($order->getId());
        }
        // Now you can pass the $orders array to your view
        $data = ['orders' => $orders, 'orderDetails' => $orderDetails];
        $this->show('view/product/orderHistory', $data);
    }

    public function deletePermanently()
    {
        try {
            // Perform the deletion
            $this->orderRepository->deletePermanently($_GET['id']);

            // Set a success message
            $this->setError(['alert' => messenger('Order deleted successfully.', 'success')]);
        } catch (PDOException $e) {
            // Handle the error (e.g., log it, display an error message)
            $this->setError(['alert' => messenger('Error deleting order. Please try again later.', 'danger')]);
        }

        // Redirect back to the order history page
        redirect(href('order', 'list'));
    }
}
?>
