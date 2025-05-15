<?php 
  function str_len($post_title, $str_num) {
    if(mb_strlen($post_title, 'UTF-8') > $str_num){
      $title = mb_substr($post_title, 0, $str_num, 'UTF-8');
      echo $title.' . . .';
    } else {
      echo $post_title;
    };
  }
?>