<?php
/**
 * The theme header
 *
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php bloginfo('name')?></title>
    <?php wp_head() ?>

    <!-- Bootstrap Core CSS -->


    <!-- Custom Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel=”stylesheet” id=”font-awesome-css” href=”//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css” type=”text/css” media=”screen”>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="page-top" class="index">

<!-- Navigation -->
<?php if(is_front_page()){?>
<nav class="navbar navbar-default navbar-fixed-top">

    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php $custom_logo_id = get_theme_mod( 'custom_logo' );
            $image= wp_get_attachment_image_src( $custom_logo_id, 'full' );
             ?>

            <div class="navbar-brand page-scroll"><a href="#page-top"><?php if($custom_logo_id){?><div class="logo"><img src="<?php echo $image[0] ?>" height="62" width="120"></div><?php } else{ echo  bloginfo('name');} ?>  </a></div>


        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
     <!--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">-->
            <?php


function my_nav_wrap() {
    // default value of 'items_wrap' is <ul id="%1$s" class="%2$s">%3$s</ul>'

    // open the <ul>, set 'menu_class' and 'menu_id' values
    $wrap  = '<ul id="%1$s" class="%2$s">';

    // the static link
    $wrap .= '<li class="hidden active"><a href="#page-top"></a></li>';

    // get nav items as configured in /wp-admin/
    $wrap .= '%3$s';



    // close the <ul>
    $wrap .= '</ul>';
    // return the result
    return $wrap;
}

            $args = array(

                'menu_class'=>'nav navbar-nav navbar-right',
                'menu_id'=>'my-menu',
                'container'=>'div',
                'container_id'=>'bs-example-navbar-collapse-1',
                'container_class'=> 'collapse navbar-collapse',
                'theme_location' => 'primary',
                'items_wrap'=>my_nav_wrap()
            );



             wp_nav_menu(  $args );  ?>
            <!--<ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="#campaing">Services</a>
                </li>
                <li>
                    <a class="page-scroll" href="#about">Portfolio</a>
                </li>
                <li>
                    <a class="page-scroll" href="#team">About</a>
                </li>
                <li>
                    <a class="page-scroll" href="#blog">Team</a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact">Contact</a>
                </li>
            </ul>
        </div>-->
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<?php } else{?>
<nav class="navbar navbar-default navbar-fixed-top">

    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand page-scroll"><a href="<?php echo home_url()?>"><?php bloginfo('name')?>  </a><br><small><?php bloginfo('description')?></small></div>


        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <!--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">-->
        <?php




        $args = array(

            'menu_class'=>'nav navbar-nav navbar-right',
            'menu_id'=>'my-menu',
            'container'=>'div',
            'container_id'=>'bs-example-navbar-collapse-1',
            'container_class'=> 'collapse navbar-collapse',
            'theme_location' => 'secondary',

        );



        wp_nav_menu(  $args );  ?>

        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<?php }?>

<!-- Header -->
<?php if(is_front_page()) {?>
<header>

    <div class="container">
        <div class="intro-text">
            <div class="intro-lead-in">Welcome To Our World!</div>
            <div class="intro-heading">Follow us</div>


        </div>
    </div>




</header>
<?php } else{ ?>

<header>
    <div class="container">
        <div class="intro-text">
            <div class="intro-lead-in">Welcome To Our World!</div>
            <div class="intro-heading">Follow us</div>


        </div>
    </div>


</header>
<?php }?>
