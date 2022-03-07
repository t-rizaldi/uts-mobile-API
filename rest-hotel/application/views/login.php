<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="<?= base_url(); ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>/assets/css/custom.css" rel="stylesheet">
</head>

<body>

    <div class="login-box">
        <h1>Login</h1>

        <form action="<?= base_url('auth/login'); ?>" method="post">
            <div class="textbox">
                <?= $this->session->flashdata('pesan'); ?>
                <i class="fa fa-user"></i>
                <input type="text" placeholder="Username" name="username" id="username" autocomplete="off">
            </div>
            <?= form_error('username', '<div class="text-danger small">', '</div>'); ?>

            <div class="textbox">
                <i class="fa fa-lock"></i>
                <input type="password" placeholder="Password" name="password" id="password">
            </div>
            <?= form_error('password', '<div class="text-danger small">', '</div>'); ?>

            <button type="submit" class="btn">Login</button>
        </form>
    </div>

</body>

</html>