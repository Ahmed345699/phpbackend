<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if(isset($_SESSION['errors'])):
    foreach($_SESSION['errors'] as $errors): ?>
        <div class="alert alert-danger text-center">
            <?php echo $errors; ?>

        </div>
    <?php
    endforeach;
    unset($_SESSION['errors']);

elseif(isset($_SESSION['success'])) :
    echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
    unset($_SESSION['success']);

endif;
?>
