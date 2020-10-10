<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
    <div class="container">
        <div class="d-flex align-items-center row">

          <div class="site-logo col-sm-1">
            <i class="fa fa-user" style="font-size:60px; color: white"></i>
          </div>

          <div class="site-logo col-sm-10">
            <h2 style="color: white; text-align:left">Welcome, <?php echo $_SESSION['admin_firstname'] . " " . $_SESSION['admin_lastname']; ?></h2>
          </div>

          <div class="site-logo col-sm-1">
            <a href="" id="logout" data-toggle="tooltip" title="Logout"><i class="fa fa-power-off third-color-text" style="font-size:35px;"></i></a>
          </div>
        </div>
    </div>
</header>
<script>
$(document).ready(function(){
  $('#logout').click(function(){
    var ajaxurl = 'logout.php';
    data =  {'action': "hello"};
    $.post(ajaxurl, data, function (response) {
        location.replace("admin_login.php");
    });
  });
});
</script>


