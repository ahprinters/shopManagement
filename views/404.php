<?php ob_start(); ?>

<div class="container mt-5">
    <div class="alert alert-danger">
        <h1>404 - Page Not Found</h1>
        <p>The requested page could not be found.</p>
        <a href="/" class="btn btn-primary">Go to Homepage</a>
    </div>
</div>

<?php 
$content = ob_get_clean();
require __DIR__ . '/layout.php';
?> 