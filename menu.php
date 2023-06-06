  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php?page=home" class="logo d-flex align-items-center">
        <img src="assets/img/navbar-logo.png" alt=""></a><div style="letter-spacing: 1px;text-align: left;font-size: 16px;font-weight: 700;margin: 0;color: #012970;">BALAI BESAR WILAYAH SUNGAI POMPENGAN JENEBERANG</div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto <?php if($page == 'home'){ echo "active"; } ?>" href="index.php?page=home">Home</a></li>
          <li><a class="nav-link scrollto <?php if($page == 'data-level'){ echo "active"; } ?>" href="index.php?page=data-level">Data</a></li>
          <li class="dropdown"><a class="nav-link scrollto <?php if($page == 'lokasi'){ echo "active"; } ?>" href="index.php?page=lokasi" class="nav-link scrollto"><span>Lokasi</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="index.php?page=bp-1" a class="nav-link scrollto <?php if($page == 'bp-1'){ echo "active"; } ?>">B.P.1</a></li>
              <li><a href="index.php?page=bp-2" a class="nav-link scrollto <?php if($page == 'bp-2'){ echo "active"; } ?>">B.P.2</a></li>
              <li><a href="index.php?page=bp-4" a class="nav-link scrollto <?php if($page == 'bp-4'){ echo "active"; } ?>">B.P.4</a></li>
              <li><a href="index.php?page=bp-5" a class="nav-link scrollto <?php if($page == 'bp-5'){ echo "active"; } ?>">B.P.5</a></li>
              <li><a href="index.php?page=bp-8" a class="nav-link scrollto <?php if($page == 'bp-8'){ echo "active"; } ?>">B.P.8</a></li>
              <li><a href="index.php?page=bp-13" a class="nav-link scrollto <?php if($page == 'bp-13'){ echo "active"; } ?>">B.P.13</a></li>
              <li><a href="index.php?page=bp-15" a class="nav-link scrollto <?php if($page == 'bp-15'){ echo "active"; } ?>">B.P.15</a></li>
              <li><a href="index.php?page=bp-17" a class="nav-link scrollto <?php if($page == 'bp-17'){ echo "active"; } ?>">B.P.17</a></li>
              <li><a href="index.php?page=bp-19" a class="nav-link scrollto <?php if($page == 'bp-19'){ echo "active"; } ?>">B.P.19</a></li>
              <li><a href="index.php?page=bendung-cakura" a class="nav-link scrollto <?php if($page == 'bendung-cakura'){ echo "active"; } ?>">Bendung Cakura</a></li>
              <li><a href="index.php?page=bendung-jenemarung" a class="nav-link scrollto <?php if($page == 'bendung-jenemarung'){ echo "active"; } ?>">Bendung Jenemarung</a></li>
              <li><a href="index.php?page=bendung-pamukkulu" a class="nav-link scrollto <?php if($page == 'bendung-pamukkulu'){ echo "active"; } ?>">Bendung Pamukkulu</a></li>       
            </ul>
          </li>
          <li><a class="nav-link scrollto <?php if($page == 'contact'){ echo "active"; } ?>" href="index.php?page=contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  