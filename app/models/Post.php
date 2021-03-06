<?php

class Post
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function fetchAllPosts()
  {
    $this->db->query('SELECT *, ps.id AS post_id, us.id AS user_id FROM posts ps
    LEFT JOIN users us ON us.id = ps.user_id 
    ORDER BY ps.created_at DESC');

    $results = $this->db->resultSet();

    return $results;
  }

  public function addPost($data)
  {
    $this->db->query('INSERT INTO posts (user_id, title, body) VALUES (:user_id, :title, :body)');

    // Bind values
    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':body', $data['body']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function fetchPostById($id)
  {
    // Run query
    $this->db->query('SELECT * FROM posts WHERE id = :id');

    // Bind values
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }

  public function updatePost($data)
  {
    $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');

    // Bind values
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':body', $data['body']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function deletePost($id)
  {
    $this->db->query('DELETE FROM posts WHERE id = :id');
    $this->db->bind(':id', $id);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
