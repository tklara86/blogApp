<?php
class Users extends Controller
{
  public function __construct()
  {
    $this->userModel = $this->model('User');
  }

  public function register()
  {
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process the form

      // Sanatize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'name' => trim($_POST['name']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
        'name_error' => '',
        'email_error' => '',
        'password_error' => '',
        'confirm_password_error' => ''
      ];

      // Validate email
      if (empty($data['email'])) {
        $data['email_error'] = 'Please enter email';
      } else {
        // Check email
        if ($this->userModel->findUserByEmail($data['email'])) {
          $data['email_error'] = 'Email is aready taken';
        }
      }

      // Validate name
      if (empty($data['name'])) {
        $data['name_error'] = 'Please enter name';
      }

      // Validate password
      if (empty($data['password'])) {
        $data['password_error'] = 'Please enter password';
      } elseif (strlen($data['password']) < 6) {
        $data['password_error'] = 'Password must be at least 6 characters';
      }

      // Validate confirm_password
      if (empty($data['confirm_password'])) {
        $data['confirm_password_error'] = 'Please confirm password';
      } else {
        if ($data['password'] != $data['confirm_password']) {
          $data['confirm_password_error'] = 'Password do not match';
        }
      }

      // Make sure errors are empty
      if (empty($data['email_error']) && empty($data['name_error']) && empty($data['password_error']) && empty($data['confirm_password_error'])) {
        // Hash password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Register user
        if ($this->userModel->register($data)) {
          flash('register_success', 'You are registered and can log in');
          redirect('users/login');
        } else {
          die('Something went wrong');
        }
      } else {
        $this->view('users/register', $data);
      }
    } else {
      // Init data
      $data = [
        'name' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'name_error' => '',
        'email_error' => '',
        'password_error' => '',
        'confirm_password_error' => ''
      ];

      // Load view
      $this->view('users/register', $data);
    }
  }

  public function login()
  {
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process the form
      // Sanatize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'email_error' => '',
        'password_error' => '',
      ];
      // Validate email
      if (empty($data['email'])) {
        $data['email_error'] = 'Please enter email';
      }

      // Validate password
      if (empty($data['password'])) {
        $data['password_error'] = 'Please enter password';
      }

      // check for user/email
      if ($this->userModel->findUserByEmail($data['email'])) {
        // User Found
      } else {
        $data['email_error'] = 'No user found';
      }
      // Make sure errors are empty
      if (empty($data['email_error']) && empty($data['password_error'])) {
        // Validated
        // Check and set logged in user
        $loggedInUser = $this->userModel->login($data['email'], $data['password']);

        if ($loggedInUser) {
          // Create session
          $this->createUserSession($loggedInUser);
        } else {
          $data['password_error'] = 'Password incorrect';

          $this->view('users/login', $data);
        }
      } else {
        $this->view('users/login', $data);
      }
    } else {
      // Init data
      $data = [
        'email' => '',
        'password' => '',
        'email_error' => '',
        'password_error' => ''
      ];

      // Load view
      $this->view('users/login', $data);
    }
  }

  public function createUserSession($user)
  {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['user_name'] = $user['name'];
    redirect('posts');
  }

  public function logout()
  {
    unset($_SESSION['user_id']);
    unset($_SESSION['email']);
    unset($_SESSION['name']);
    session_destroy();
    redirect('users/login');
  }
}
