<?php

function slugify($str) {
    $str = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
    $str = preg_replace('/[^a-z0-9-]+/', '-', strtolower(trim($str)));
    return trim($str, '-');
}

function uploadImage($file, $old_img = null) {
    $target_dir = "uploads/activities/";
    if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
    
    $file_name = time() . '_' . basename($file['name']);
    $target_file = $target_dir . $file_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    $check = getimagesize($file['tmp_name']);
    if ($check === false) return $old_img;
    
    if ($file['size'] > 2000000) return $old_img; // 2Mo max
    $allowed = ['jpg', 'jpeg', 'png', 'webp'];
    if (!in_array($imageFileType, $allowed)) return $old_img;
    
    if (move_uploaded_file($file['tmp_name'], $target_file)) {
        return $target_file;
    }
    return $old_img;
}

?>