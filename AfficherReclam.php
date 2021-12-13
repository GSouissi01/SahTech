<!DOCTYPE html>

<?php
	require_once("../Controller/reclamC.php");

	$reclamC= new reclamC();
	$listReclamation = $reclamC->afficherReclamation();
  if(isset($_POST['recherche']) && isset($_POST['rechercheInput'])){
    if(!empty($_POST['rechercheInput']))
      $listReclamation=$reclamC->recherche($_POST['rechercheInput']);
  }

  if(isset($_POST['tri'])){

    if($_POST['triInput']!='default'){

      $listReclamation=$reclamC->tri($_POST['triInput']);
    }
  }
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Medicio Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../../assets/img/favicon.png" rel="icon">
    <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/style1.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <link href="../../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../../assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Medicio - v4.6.0
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
            <div class="align-items-center d-none d-md-flex">
                <i class="bi bi-clock"></i> Monday - Saturday, 8AM to 10PM
            </div>
            <div class="d-flex align-items-center">
                <i class="bi bi-phone"></i> Call us now +1 5589 55488 55
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <a href="index.html" class="logo me-auto" style="height: auto;"><img src="../../assets/img/logo.png"
                    alt=""></a>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto " href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#services">Services</a></li>
                    <li><a class="nav-link scrollto" href="#departments">Departments</a></li>
                    <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
                    <li class="dropdown"><a href="#"><span>Reclamation</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="./AjouterReclam.php">Reclamé</a></li>
                            <li><a href="#">Consulter Reclamation</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span>
                Appointment</a>

        </div>
    </header><!-- End Header -->

    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-left">
                    <h2>Reclamation</h2>
                    <div class="page_link">
                        <a href="../">Home</a>
                        <a href="#">Reclamation</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">reclamation</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <div>
                            <div class="recherche-wrap">
                                <form action="" method="POST">
                                    <input type="text" name="rechercheInput" id="rechercheInput" class="form-control"
                                        placeholder="recherche par Nom et Prenom">
                                    <button type="submit" name="recherche" class="btn btn-light">recherche</button>
                                </form>
                            </div>
                            <div class="recherche-wrap">
                                <form action="" method="POST">
                                    <select name="triInput">
                                        <option value="default" disabled selected>champ</option>
                                        <option value="nom_prenom">nom prenom</option>
                                        <option value="etat">Etat Reclamation</option>
                                        <option value="date">date</option>
                                        <option value="type">type Reclamation</option>
                                    </select>
                                    <button type="submit" name="tri" class="btn btn-light">Tri</button>
                                </form>
                            </div>
                        </div>

                        </form>
                        <table class="table table-responsive-xl">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>nom et Prenom</th>
                                    <th>Contenu Reclamation</th>
                                    <th>Etat Reclamation</th>
                                    <th>Type reclamation</th>
                                    <th>Date Reclamation</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($listReclamation as $reclam){

							   ?>
                                <tr class="alert" role="alert">
                                    <td>
                                        <?php echo $reclam['id'] ?>
                                    </td>
                                    <td class="d-flex align-items-center">
                                        <?php echo $reclam['nom_prenom'] ?>
                                    </td>
                                    <td><?php echo $reclam['texte'] ?></td>
                                    <td class="status" style="min-width: 163px"><span
                                            class="<?php if($reclam['etat']=='traité') {echo 'active'; }else echo 'waiting';?>"><?php echo $reclam['etat'] ?></span>
                                    </td>

                                    <td><?php echo $reclam['type'] ?></td>
                                    <td><?php echo $reclam['date'] ?></td>
                                    <td> <a href="./affichierReponse.php?id=<?php echo $reclam['id'] ?>"> <i
                                                class="fa fa-comment" aria-hidden="true"></i></a></td>

                                    <td class="border-bottom-0">
                                        <form
                                            action="../SupprimerReclam.php?id=<?php echo $reclam['id'] ?>&return=client"
                                            method="post">
                                            <button type="submit" class="close" data-dismiss="alert" aria-label="Close">
                                        </form>
                                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                        </button>
                                    </td>
                                </tr>
                                <?php
							 }
							 ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Contact Section ======= -->

    <!-- Vendor JS Files -->
    <script src="../../assets/vendor/aos/aos.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../../assets/vendor/php-email-form/validate.js"></script>
    <script src="../../assets/vendor/purecounter/purecounter.js"></script>
    <script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="../../assets/js/main.js"></script>

</body>

</html>