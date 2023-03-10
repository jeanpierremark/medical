<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Espace-Secrétaire</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  


  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">


   


   

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Template Main CSS File -->
  
  
  <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" style="background-color: aliceblue;height: 40px;" class="header fixed-top d-flex align-items-center ">

    <div class="d-flex align-items-center justify-content-between">
      <div href="" class="logo d-flex align-items-center">

        <span class="d-none d-lg-block" style="color: darkblue;"> SJD-Medical</span>
      </div>
      <i class="bi bi-list toggle-sidebar-btn" style="color: darkblue;"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../img/sec.jpeg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2" style="color:darkblue;"> {{ Auth::user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
            <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <span class="fa fa-minus-circle">  {{ __('Déconnexion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
            </li>
            <li>
            <a class="dropdown-item text-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" href=""
                                       >
                                       <span class="fa fa-edit">  Modifier mot de passe
                                    </a>

                                    
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside  class="sidebar " style="background-image: url('../img/sec.jpeg'); margin-top: 0px ; " >


    <ul class="sidebar-nav" id="sidebar-nav">


    <li class="nav-item">
                <a class="nav-link " href="{{route('secretaire.dashboard')}}">
                    <i class="fas  fa-home"></i>
                    Accueil
                </a>
            </li>
           
            <hr class="sidebar- text-light">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-users"></i>Agenda</a>
                <div class="dropdown-menu  border-0">
                    <a href="{{ route('secretaire.listerendezVous') }}" class="dropdown-item fa fa-list text-warning">&nbsp;Liste des rendez-vous</a>
                    <a href="{{ route('getevent') }}" class="dropdown-item fa fa-calendar-alt text-danger">&nbsp;Calendrier</a>
                    
                    
                </div>
            </div>
            <!--
          <hr class="sidebar- text-light">
            <li class="nav-item">
                <a class="nav-link " href="">
                 <i class="fas fa-users"></i>
                 Patients
                </a>
            </li>
        -->
            
            <hr class="sidebar- text-light">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-users"></i>Patients</a>
                <div class="dropdown-menu  border-0">
                    <a href="{{ route('secretaire.ajouterPatient') }}" class="dropdown-item fa fa-user-plus text-success">&nbsp;Ajouter un patient</a>
                    <a href="{{ route('secretaire.listerPatient') }}" class="dropdown-item fa fa-list text-warning">&nbsp;Liste des Patients</a>
                    
                    
                </div>
            </div>

    </ul>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

   @yield('content')
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title bi bi-pencil-square" id="exampleModalLabel">Modifiier Mot de passe</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      @if(isset($var))
				
        <div style="width: 100%; font-size: 20px;" class="alert alert-danger ">{{$var}}</div>

      @endif
		<form method="POST" action="{{route('secretaire.passe')}}" >
        @csrf
    
            <tr>
          
                <td  style="font-weight:bold;font-size:16px; font-family:times new roman" >Ancien mot de passe</td>
                
                
                
               
                <td>
            <div class="col-3">
                <div class="input-group " style="width:400px">
                    <div class="input-group-text bg-primary" ><i class="fas fa-lock text-light"></i></div>
                    <input type="password" class="form-control" name="apass" value="">
                </div>
            </div><br>
            </td>
            </tr>
			<tr>
           
                <td style="font-weight:bold;font-size:16px ; font-family:times new roman" >Nouveau mot de passe</td>
                
                <td>
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-lock text-light"></i></div>
                    <input type="password" class=" form-control" name="npass" value="" >
                </div>
            </div> <br>
            </td>
            </tr> 
     
            <tr>
           
           <td style="font-weight:bold;font-size:16px ; font-family:times new roman" >confirmer mot de passe</td>
           
           <td>
       <div class="col-3">
           <div class="input-group" style="width:400px">
               <div class="input-group-text bg-primary"><i class="fas fa-lock text-light"></i></div>
               <input type="password" class=" form-control" name="cpass" value="" >
           </div>
       </div> <br>
       </td>
       </tr> 
    
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Changer</button>
      </div>
</form>
      </div>
      
    </div>
  </div>
</div>
   
    
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <footer id="footer" class="footer" style="background-color:white">
    <div class="copyright" >
      &copy; Copyright 2022 <strong>SJD</strong>. Tous droits réservés
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  

  
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
 
  <!-- Template Main JS File -->
  
  <script src="../assets/js/main.js"></script>
  <script src="../assets/js/tab.js"></script>
  
</body>
@if(isset($events))
<script>
        $(document).ready(function() {
          if( @json($events)){
          var rv= @json($events);
          }
            var calendar = $('#calendar').fullCalendar({
              header: {
                left: 'prev, next today',
                center:'title',
                right: 'month, agendaWeek, agendaDay, list'
              },
              events: rv
                
            });
        });
    </script>
@endif
</html>
