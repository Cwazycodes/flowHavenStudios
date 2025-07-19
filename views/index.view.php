<?php require base_path('views/partials/header.php'); ?>

<main>
    <div class="container">
        <h1>Welcome to <?= htmlspecialchars($title ?? 'My App') ?></h1>
        <p>This is your default landing page.</p>

        <?php if ($message = \Core\Session::get('success')): ?>
            <div class="alert alert-success">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>
