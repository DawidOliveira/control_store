<header class="drawer-header bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-sm d-flex align-items-sm-center">
                <img src="../assets/account.png" class="img-fluid" alt="Usuário">
            </div>
            <div class="col-lg">
                <a href="#" class="h5 font-weight-bold text-white"><?php echo $_SESSION['dados']['nome'] ?></a>
                <p class=" font-weight-light text-light">
                    <?php echo $_SESSION['dados']['cargo'] ?>
                </p>
                <a href="?func=logout" class="small text-white">Sair</a>
                <?php
                    if(isset($_GET['func']) and $_GET['func']=='logout'){
                        require_once('../controllers/userController.php');
                        $uc = new UserController();
                        $uc->logout();
                    }
                ?>
            </div>
		</div>
	</div>
</header>