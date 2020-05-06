<?php
// simple page riderect
function redirect($page)
{
  header('location: ' . URLROOT . $page);
}
