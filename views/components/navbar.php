<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">

        <div class="collapse navbar-collapse" id="navbarNav">

        </div>
        <div class="d-flex">

            <?php if (!$_SESSION['user']) { ?>
                <a class="nav-link active m-2" href="/login">Вхід</a>
                <a class="nav-link active  m-2" href="/register">Реєстрація</a>
            <?php }else{ ?>
                <form action="/auth/logout" method="post">
                    <button type="submit" class="btn btn-danger">Вихід</button>
                </form>
            <?php }?>
        </div>
    </div>
</nav>