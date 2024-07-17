<?php
header('Content-Type: application/json');

require_once "../classes/DB-Connection.php";
require_once "../classes/class.BlogManage.php";
include_once "../classes/clientCode.php";
include_once "../classes/sessionManager.php";
include_once "../classes/class.Input.php";

$sFlag = Input::request('sFlag');

$response = array('status' => 'error', 'message' => 'Invalid request');

try {
    $blogManage = new BlogManage();

    switch ($sFlag) {
        case 'addBlogPost':
            $sTitle = Input::request('title');
            $sAuthorName = Input::request('authorName');
            $sData = $_REQUEST['content'];

            if ($sTitle && $sAuthorName && $sData) {
                $blogManage->addBlog($sTitle, $sAuthorName, $sData);
                $response['status'] = 'success';
                $response['message'] = 'Blog post added successfully';
            } else {
                $response['message'] = 'Missing required fields';
            }
            break;

        case 'fetchAllPosts':
            $iLimit = Input::request('iLimit');
            $posts = $blogManage->getAllBlogs($iLimit);
            $response['status'] = 'success';
            $response['message'] = 'Blog Fetch';
            $response['data'] = $posts;
            break;

        case 'fetchPostById':
            $postId = Input::request('id');
            if ($postId) {
                $post = $blogManage->getBlog($postId);
                if ($post) {
                    $response['status'] = 'success';
                    $response['message'] = 'Blog Fetch';
                    $response['data'] = $post;
                } else {
                    $response['message'] = 'Post not found';
                }
            } else {
                $response['message'] = 'Missing required fields';
            }
            break;

        case 'updatePost':
            $postId = Input::request('id');
            $sTitle = Input::request('title');
            $sAuthorName = Input::request('authorName');
            $sData = $_REQUEST['content'];

            if ($postId && $sTitle && $sAuthorName && $sData) {
                $blogManage->updateBlog($postId, $sTitle, $sAuthorName, $sData);
                $response['status'] = 'success';
                $response['message'] = 'Blog post updated successfully';
            } else {
                $response['message'] = 'Missing required fields';
            }
            break;

        case 'deletePost':
            $postId = Input::request('id');
            if ($postId) {
                $blogManage->deleteBlog($postId);
                $response['status'] = 'success';
                $response['message'] = 'Blog post deleted successfully';
            } else {
                $response['message'] = 'Missing required fields';
            }
            break;

        default:
            $response['message'] = 'Unknown request';
            break;
    }
} catch (Exception $e) {
    $response['message'] = 'Error: ' . $e->getMessage();
}

echo json_encode($response);
?>
