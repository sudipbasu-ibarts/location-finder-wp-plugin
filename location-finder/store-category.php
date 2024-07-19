<?php
   global $wpdb;
   $table_name = $wpdb->prefix . 'store_categories'; // Change 'custom_table' to your table name
   $charset_collate = $wpdb->get_charset_collate();

   $sql = "CREATE TABLE $table_name (
       id INTEGER(255) NOT NULL AUTO_INCREMENT,
       name varchar(255) NOT NULL,
       description varchar(255) NOT NULL,
       slug varchar(255) NOT NULL,
       PRIMARY KEY (id)
   ) $charset_collate;";

   require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
   dbDelta($sql);
echo('<h1>Store Categories</h1>');
?>
<?php
/*
Template Name: Custom Form Page
*/

//get_header();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cf_submit'])) {
    global $wpdb;

    // Sanitize input data
    $name = sanitize_text_field($_POST['cf_name']);
    $description = sanitize_textarea_field($_POST['cf_description']);
    $slug = sanitize_title($_POST['cf_slug']);

    // Insert data into the database
    $wpdb->insert(
        'wp_store_categories', // Table name
        array(
            'name' => $name,
            'description' => $description,
            'slug' => $slug
        ),
        array(
            '%s', // Data format for 'name'
            '%s', // Data format for 'description'
            '%s'  // Data format for 'slug'
        )
    );

    // Check for errors
    if ($wpdb->last_error) {
        echo '<p>Error: ' . $wpdb->last_error . '</p>';
    } else {
        echo '<div class="notice notice-success is-dismissible"><p>Successfully inserted store category.</p></div>';
    }
}
?>

<div class="custom-form">
    <form method="post" action="">
        <label for="cf_name">Name:</label>
        <input type="text" id="cf_name" name="cf_name" required>

        <label for="cf_description">Description:</label>
        <textarea id="cf_description" name="cf_description" required></textarea>

        <label for="cf_slug">Slug:</label>
        <input type="text" id="cf_slug" name="cf_slug" required>

        <input type="submit" name="cf_submit" value="Submit">
    </form>
</div>
<?php
function handle_delete_category() {
    // Check nonce for security
    check_ajax_referer('delete_category_nonce', 'nonce');

    global $wpdb;
    $id = intval($_POST['id']);

    if ($id) {
        $result = $wpdb->delete('wp_store_categories', array('id' => $id), array('%d'));
        if ($result !== false) {
            wp_send_json_success();
        } else {
            wp_send_json_error(array('message' => 'Failed to delete item.'));
        }
    } else {
        wp_send_json_error(array('message' => 'Invalid ID.'));
    }

    //wp_die(); // Required to terminate immediately and return a proper response
}
add_action('wp_ajax_delete_category', 'handle_delete_category');
?>
<div class="data-table-container">
    <table id="store-categories" class="display">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            global $wpdb;
            $results = $wpdb->get_results("SELECT id, name, description, slug FROM wp_store_categories");

            foreach ($results as $row) {
                echo '<tr>';
                echo '<td>' . esc_html($row->name) . '</td>';
                echo '<td>' . esc_html($row->description) . '</td>';
                echo '<td>' . esc_html($row->slug) . '</td>';
                echo '<td><button class="delete-btn" data-id="' . esc_attr($row->id) . '">Delete</button></td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>