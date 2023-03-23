<?php

// Register CSS
function register_styles() {
    wp_register_style( 'modal.css', plugin_dir_url( __FILE__ ) . 'css/style.css', array(), NEWSLETTER_VERSION );
    wp_enqueue_style( 'modal.css');
}
add_action( 'wp_enqueue_scripts','register_styles' );

// Add menu
function test_content() {
    add_thickbox();

    echo '<div id="pr-modal" class="pr-modal">
                <div class="modal-container">
                    <div class="pr-header">
                        <span class="header-title">PRUnderground Newsletter</span>
                        <div class="header-left-bottom-border"></div>
                    </div>
                    <form method="post" action="#">
                        <div>
                            <input name="username" type="text" placeholder="Your name here" required>
                        </div>
                        <div class="mt-15">
                            <input name="useremail" type="email" placeholder="Email Address" required>
                        </div>
                        <div class="mt-15">
                            <button name="submit" class="pr-button" type="submit">
                                Signup
                            </button>
                        </div>
                    </form>
                </div>
            </div>';
}
add_action( 'the_content', 'test_content' );

// Validate if already subscribed
if (!empty($_COOKIE['subscribed'])) {
    remove_action( 'the_content', 'test_content' );
}

// When the user submits the form
if(isset($_POST['submit']) && (!empty($_POST['username']) && !empty($_POST['useremail']))) {
    $name = $_POST['username'];
    $email = $_POST['useremail'];

    global $wpdb;

    $table_name = $wpdb->prefix . 'newsletter';
    $sql = "INSERT INTO $table_name (name, email)
            VALUES ('$name', '$email');";

    if ($wpdb->query($sql)) {
        add_action( 'init', 'set_newsletter_cookie' );
        remove_action( 'the_content', 'test_content' );
    }
}

// Set cookie on subscribe
function set_newsletter_cookie() {
    setcookie( 'subscribed', true );
}
