<?php

class Posts extends Controller
{

  public function __construct()
  {
    // If we ar not logged in
    if (!isLoggedIn()) {
      redirect('users/login');
    }

    $this->postModel = $this->model('Post');
    $this->userModel = $this->model('User');
  }

  public function index()
  {
    $posts = $this->postModel->fetchAllPosts();

    $data = [
      'posts' => $posts
    ];
    $this->view('posts/index', $data);
  }

  public function add()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanatize POST array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'user_id' => $_SESSION['user_id'],
        'title_error' => '',
        'body_error' => ''
      ];

      // Validate title
      if (empty($data['title'])) {
        $data['title_error'] = 'Please enter title';
      }

      // Validate body
      if (empty($data['body'])) {
        $data['body_error'] = 'Please enter body';
      }

      // Make sure no errors 
      if (empty($data['title_error']) && empty($data['body_error'])) {
        // Validate
        if ($this->postModel->addPost($data)) {
          flash('post_message', 'Post Added');
          redirect('posts');
        } else {
          die('Something went wrong');
        }
      } else {
        $this->view('posts/add', $data);
      }
    } else {
      $data = [
        'title' => '',
        'body' => ''
      ];
      $this->view('posts/add', $data);
    }
  }

  public function show($id)
  {
    $post = $this->postModel->fetchPostById($id);
    $user = $this->userModel->fetchUserById($post['user_id']);

    $data = [
      'post' => $post,
      'user' => $user
    ];
    $this->view('posts/show', $data);
  }

  public function edit($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanatize POST array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'id' => $id,
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'user_id' => $_SESSION['user_id'],
        'title_error' => '',
        'body_error' => ''
      ];

      // Validate title
      if (empty($data['title'])) {
        $data['title_error'] = 'Please enter title';
      }

      // Validate body
      if (empty($data['body'])) {
        $data['body_error'] = 'Please enter body';
      }

      // Make sure no errors 
      if (empty($data['title_error']) && empty($data['body_error'])) {
        // Validate
        if ($this->postModel->updatePost($data)) {
          flash('post_message', 'Post Updated');
          redirect('posts');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load views with errors
        $this->view('posts/edit', $data);
      }
    } else {
      // Get existing post from model
      $post = $this->postModel->fetchPostById($id);
      // Check for owner
      if ($post['user_id'] != $_SESSION['user_id']) {
        redirect('posts');
      }
      $data = [
        'id' => $id,
        'title' => $post['title'],
        'body' => $post['body']
      ];
      $this->view('posts/edit', $data);
    }
  }

  public function delete($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      // Get existing post from model
      $post = $this->postModel->fetchPostById($id);
      // Check for owner
      if ($post['user_id'] != $_SESSION['user_id']) {
        redirect('posts');
      }

      if ($this->postModel->deletePost($id)) {
        flash('post_message', 'Post removed');
        redirect('posts');
      } else {
        die('Somethong went wrong');
      }
    } else {
      redirect('posts');
    }
  }
}
