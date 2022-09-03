<?php
use App\Services\Page;
use App\Services\Router;

session_start();

if (!$_SESSION['user']) {
    Router::redirect('/login');
}

?>



<!doctype html>
<html lang="en">
<?php Page::part('head'); ?>
<body>
    <?php Page::part('navbar'); ?>
    <div class="container">
       <h3> Дякую що увійшли, <?=$_SESSION['user']['email']?></h3>
    </div>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            <div class="col">
                <div class="card mb-4 rounded-1 shadow-sm">
                    <div class="card-header py-1">
                        <h4 class="my-0 fw-normal">Boss@mail</h4>
                    </div>
                    <div class="card-body">
                        <button type="button"  onclick="getAllTodos('boos')" class="w-100 btn btn-lg btn-outline-primary" <?php if ($_SESSION['user']['position'] != 1){echo 'disabled';}?>>Кнопка boos</button>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4 rounded-1 shadow-sm">
                    <div class="card-header py-1">
                        <h4 class="my-0 fw-normal">Manager@com</h4>
                    </div>
                    <div class="card-body">
                        <button type="button" onclick="getAllTodos('manager')"   class="w-100 btn btn-lg btn-outline-primary" <?php if ($_SESSION['user']['position'] != 1 AND $_SESSION['user']['position'] != 2){echo 'disabled';}?>>Кнопка manager</button>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4 rounded-1 shadow-sm">
                    <div class="card-header py-1">
                        <h4 class="my-0 fw-normal">Performer@com</h4>
                    </div>
                    <div class="card-body">
                        <button type="button" onclick="getAllTodos('performer')" class="w-100 btn btn-lg btn-outline-primary">Кнопка performer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <form action="/post" method="post">
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center" id="todo">

            </div>
            <?php if ($_SESSION['success']) {?>
                <div class="text-success">
                    Дані успішно збережені!!!
                </div>
            <?php } unset($_SESSION['success'])?>
            <input class="btn btn-primary w-100" type="submit" value="Зберегти всі записм">
        </form>
    </div>
<?php Page::part('footer'); ?>