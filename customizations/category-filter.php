<?php 
function get_child_category_list(){
      $current_category = get_queried_object();
    ob_start();
    
if (is_product_category()) {
    $current_category = get_queried_object();
    
    // Get parent category
    $parent_category = $current_category->parent ? get_term($current_category->parent, 'product_cat') : $current_category;
    echo '<div class="bwp-filter">';
       echo '<h3>Category</h3>';
    // Display parent category name
    echo '<ul class="parent-ul">'; // Add class for parent ul
 echo '<li><a href="' . get_term_link($parent_category) . '">' . $parent_category->name . '</a></li>'; // Parent category
    
    
    // Get child categories of the parent category
    $child_categories = get_terms(array(
        'taxonomy' => 'product_cat',
        'parent' => $parent_category->term_id,
        'hide_empty' => false,
    ));

    if (!empty($child_categories)) {
        echo '<ul class="sublist-ul">'; // Add class for sublist ul
        foreach ($child_categories as $child_category) {
            echo '<li><a href="' . get_term_link($child_category) . '">' . $child_category->name . '</a>'; // Child category
            // Check for subcategories
            $subcategories = get_terms(array(
                'taxonomy' => 'product_cat',
                'parent' => $child_category->term_id,
                'hide_empty' => false,
            ));
            if (!empty($subcategories)) {
                echo '<ul class="sublist-ul">'; // Add class for sublist ul
                foreach ($subcategories as $subcategory) {
                    echo '<li><a href="' . get_term_link($subcategory) . '">' . $subcategory->name . '</a></li>';
                    // You can continue nesting subcategories here if needed
                }
                echo '</ul>';
            }
            echo '</li>';
        }
        echo '</ul>';
    }
    echo '</ul>'; echo '</div>';
}

// Check if it's the shop page
// Check if it's the shop page
if (is_shop()) {
    // Get all product categories
    $product_categories = get_terms(array(
        'taxonomy' => 'product_cat',
        'parent' => 0,
        'hide_empty' => false,
    ));

    if (!empty($product_categories)) {
         echo '<div class="bwp-filter">';
         echo '<h3>Category</h3>';
        echo '<ul class="parent-ul">'; // Add class for parent ul
        foreach ($product_categories as $category) {
            echo '<li><a href="' . get_term_link($category) . '">' . $category->name . '</a>'; // Category
            // Check for subcategories
            $subcategories = get_terms(array(
                'taxonomy' => 'product_cat',
                'parent' => $category->term_id,
                'hide_empty' => false,
            ));
            if (!empty($subcategories)) {
                echo '<ul class="sublist-ul">'; // Add class for sublist ul
                foreach ($subcategories as $subcategory) {
                    echo '<li><a href="' . get_term_link($subcategory) . '">' . $subcategory->name . '</a></li>';
                    // You can continue nesting subcategories here if needed
                }
                echo '</ul>';
            }
            echo '</li>';
        }
        echo '</ul>';
        echo '</div>';
    }
}

    return ob_get_clean();
}
?>