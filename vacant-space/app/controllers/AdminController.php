<?php

class AdminController extends Controller {
    public function index() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['rank'] !== 'Admin') {
            // Optional: Redirect or just show a message. For mock purposes, we'll let anyone see it or pretend they are an admin
            // header('Location: ?route=home');
            // exit;
        }

        // Mock data for the dashboard
        $data = [
            'recentOrders' => [
                ['id' => 'ORD-1023', 'customer' => 'John Doe', 'total' => 45.00, 'status' => 'Shipped'],
                ['id' => 'ORD-1024', 'customer' => 'Jane Smith', 'total' => 120.00, 'status' => 'Pending'],
                ['id' => 'ORD-1025', 'customer' => 'Bob Miller', 'total' => 18.00, 'status' => 'Delivered'],
            ],
            'inventory' => Database::getBeers()
        ];

        $this->render('admin/index', $data);
    }
}
