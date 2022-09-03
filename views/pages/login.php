<?php
use App\Services\Page;
use App\Services\Router;

if ($_SESSION['user']) {
    Router::redirect('/');
}
?>

<!doctype html>
<html lang="en">
<?php Page::part('head'); ?>
<body>
    <?php Page::part('navbar'); ?>
    <div class="container">
        <?php if ($_SESSION['success']) {?>
            <div class="text-success">
                Ви успішно зареєструвалися!!!
            </div>
        <?php } unset($_SESSION['success'])?>
        <?php if ($_SESSION['error']) {?>
            <div class="text-danger">
                <?=$_SESSION['error']?>
            </div>
        <?php } unset($_SESSION['error'])?>
        <h2 class="mt-4">Вхід</h2>
        <form class="mt-4" action="/auth/login" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email*</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php if ($_SESSION['email_old'])echo $_SESSION['email_old']; unset($_SESSION['email_old'])?>" required >
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль*</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
            </div>
            <button type="submit" class="btn btn-primary">Вхід</button>
        </form>
    </div>
</body>
</html>