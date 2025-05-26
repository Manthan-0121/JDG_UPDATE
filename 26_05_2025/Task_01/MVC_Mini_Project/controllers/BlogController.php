<?php
class BlogController
{
    public function showBlog($blogId)
    {
        if ($blogId) {
            require 'views/blog.php';
        } else {
            echo "Blog ID not specified.";
        }
    }
}
