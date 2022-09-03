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
        <?php if ($_SESSION['error']) {?>
            <div class="text-danger">
                <?=$_SESSION['error']?>
            </div>
        <?php } unset($_SESSION['error'])?>
        <h2 class="mt-4">Реєстрація</h2>
        <form class="mt-4" action="/auth/register" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email*</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php if ($_SESSION['email_old'])echo $_SESSION['email_old']; unset($_SESSION['email_old'])?>">
                <?php if ($_SESSION['errors']['email']) { foreach ($_SESSION['errors']['email'] as $error){ ?>
                <div class="text-danger">
                    <?=$error?>
                </div>
                <?php }} unset($_SESSION['errors']['email'])?>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль*</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                <?php if ($_SESSION['errors']['password']) { foreach ($_SESSION['errors']['password'] as $error){ ?>
                    <div class="text-danger">
                        <?=$error?>
                    </div>
                <?php }} unset($_SESSION['errors']['password'])?>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Підтвердження пароля*</label>
                <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Посада</label>
                <select class="form-select"  name="position" aria-label="Default select example">
                    <option value="1">Директор</option>
                    <option value="2">Менеджер</option>
                    <option value="3">Исполнитель</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Реєстрація</button>
        </form>
    </div>
</body>
</html>