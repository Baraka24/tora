<div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <div class="nav-item dropdown">
                        <?php
            $i=0;
            while($category=$categories->fetch())
            { 
                $i++;
                ?>
                        <a href="shop.php?id=<?=$category[0]?>" class="nav-item nav-link"><?=$category[1]?></a>
                        <?php
            }
            ?>    
                        </div>
                       
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link active">Accueil</a>
                            <!-- <a href="shop.php" class="nav-item nav-link">Boutique</a> -->
                            <a href="cart.php" class="nav-item nav-link">Mes achats</a>
                           <!--  <a href="contact.php" class="nav-item nav-link">Contactez-nous</a> -->
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <a href="register.php" class="nav-item nav-link">S'enregistrer</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>