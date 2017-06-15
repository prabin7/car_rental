<!DOCTYPE html>
<html lang="en">
<head>
         
            <title>Taxi Booking System</title>
            <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
            
            <link href="css/bootstrap.css" rel="stylesheet">
            <link href="css/bootstrap-select.css" rel="stylesheet"> 
            <link href="css/style.css" rel="stylesheet"> 
            <link href="css/color.css" rel="stylesheet">
            <link href="css/custom-responsive.css" rel="stylesheet"> 
            <link href="css/animate.css" rel="stylesheet">
            <link href="css/component.css" rel="stylesheet">
            <link href="css/default.css" rel="stylesheet">
            <!-- font awesome this template -->
            <link href="fonts/css/font-awesome.css" rel="stylesheet">
            <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
            
    </head>
    <body>
        <div id="preloader">
            <div class="preloader-container">
                <img src="images/preloader.gif" class="preload-gif" alt="preload-image">
            </div>
        </div>

        @yield('body')
        
        

        @include('sites.includes.footer')
        <!-- ================ footer html Exit ================ -->
        <script src="js/jquery.js"></script> 
        <script src="js/menu/jquery.min.js"></script>
        <script src="js/menu/modernizr.custom.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
        <script src="js/g-map/map.js" type="text/javascript"></script> 
        <script src="js/uikit.js" type="text/javascript"></script>   <!-- -->
        <script src="js/jquery.stellar.js"></script> 
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-select.js"></script>
        <script src="js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="js/custom.js" type="text/javascript"></script>  
        <script src="js/menu/jquery.dlmenu.js"></script>
        <script src="js/menu/custom-menu.js"></script> 
    </body>
</html>