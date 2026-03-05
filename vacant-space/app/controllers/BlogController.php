<?php

class BlogController extends Controller {
    public function index() {
        $data = [
            'posts' => Database::$BLOG_POSTS
        ];
        $this->render('blog/index', $data);
    }

    public function detail() {
        $id = $_GET['id'] ?? null;
        $post = null;

        foreach (Database::$BLOG_POSTS as $p) {
            if ($p['id'] == $id) {
                $post = $p;
                break;
            }
        }

        if (!$post) {
            // Redirect to index if not found
            header("Location: ?route=blog");
            exit;
        }

        $data = [
            'post' => $post
        ];
        $this->render('blog/detail', $data);
    }
}
