<?php 
function remove_image_size_text($image_url) {
    // Regular expression to remove the size text at the end of the image URL
    $pattern = '/(-\d+x\d+)(\.[a-zA-Z]{3,4})$/';
    $replacement = '$2'; // Replaces the matched pattern with the file extension

    // Replace the matched pattern with an empty string to remove the size text
    $new_image_url = preg_replace($pattern, $replacement, $image_url);

    return $new_image_url;
}
?>