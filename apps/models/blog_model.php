<?php

class Blog_Model extends CI_Model {
    
  function __construct() {
      parent::__construct();
  }
    
    
  function SaveBlog(){
      
      $album = R::dispense('album');
      $album->title = '13 Songs';
      $album->artist = 'Fugazi';
      $album->year = 1990;
      $album->rating = 5;
      return $id = R::store($album);
      
  }
    
}
?>
