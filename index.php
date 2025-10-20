<?php 

require_once("conexao.php");

//TOTAIS
$query = $pdo->query("SELECT * FROM pratos");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_pratos = @count($res);

$query = $pdo->query("SELECT * FROM categorias where nome = 'Vinhos'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_cat = @count($res);
$total_vinhos = 0;
if($total_cat > 0){
  $id_cat_vinho = $res[0]['id'];
  $query2 = $pdo->query("SELECT * FROM produtos where categoria = '$id_cat_vinho'");
  $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
  $total_vinhos = @count($res2);
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 

  <meta name="description" content="restaurante em Belo Horizonte, restaurante alto padrão, restaurante barato">
  <meta name="author" content="Hugo Vasconcelos"> 

  <title><?php echo $nome_site ?></title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/img/icone2.ico" type="image/x-icon">

  <!-- Font awesome -->
  <link href="assets/css/font-awesome.css" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">   
  <!-- Slick slider -->
  <link rel="stylesheet" type="text/css" href="assets/css/slick.css">    
  <!-- Date Picker -->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datepicker.css">    
  <!-- Fancybox slider -->
  <link rel="stylesheet" href="assets/css/jquery.fancybox.css" type="text/css" media="screen" /> 
  <!-- Theme color -->
  <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">     

  <!-- Main style sheet -->
  <link href="style.css" rel="stylesheet">    


  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>        
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Prata' rel='stylesheet' type='text/css'>


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>  

    <style type="text/css">
      .alerta{
        background-color: #060d54; color:#FFF; padding:15px; font-family: Arial; text-align:center; position:fixed; bottom:0; width:100%; opacity: 80%; z-index: 1;
      }

      .alerta.hide{
       display:none !important;
     }

     .link-alerta{
      color:#f2f2f2; 
    }

    .link-alerta:hover{
      text-decoration: underline;
      color:#FFF;
    }

    .botao-aceitar{
      background-color: #e3e3e3; padding:7px; margin-left: 15px; border-radius: 5px; border: none; margin-top:3px;
    }

    .botao-aceitar:hover{
      background-color: #f7f7f7;
      text-decoration: none;

    }

  </style>

  <div class="alerta hide">
    A gente guarda estatísticas de visitas para melhorar sua experiência de navegação, saiba mais em nossa  <a class="link-alerta" title="Ver as políticas de privacidade" target="_blank" href="politica-de-privacidade.php" >política de privacidade.</a>
    <a class="botao-aceitar" href="#">Aceitar</a>
  </div>


  <script>
    if (!localStorage.meuCookie1) {
      document.querySelector(".alerta").classList.remove('hide');
    }

    const acceptCookies = () => {
      document.querySelector(".alerta").classList.add('hide');
      localStorage.setItem("meuCookie1", "accept");
    };

    const btnCookies = document.querySelector(".botao-aceitar");

    btnCookies.addEventListener('click', acceptCookies);
  </script>



  <!-- Pre Loader 
  <div id="aa-preloader-area">
    <div class="mu-preloader">
      <img src="assets/img/preloader2.gif" width="150px" alt=" loader img">
    </div>
  </div>
-->
<!--START SCROLL TOP BUTTON -->
<a class="scrollToTop" href="#">
  <i class="fa fa-angle-up"></i>
  <span>Topo</span>
</a>
<!-- END SCROLL TOP BUTTON -->

<!-- Start header section -->
<header id="mu-header">  
  <nav class="navbar navbar-default mu-main-navbar" role="navigation">  
    <div class="container">
      <div class="navbar-header">
        <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!-- LOGO -->                                                        
        <a class="navbar-brand" href="index.php"><img src="assets/img/logo2.png" alt="Logo img"></a> 
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul id="top-menu" class="nav navbar-nav navbar-right mu-main-nav">
          <li><a href="#mu-slider">HOME</a></li>
          <li><a href="#mu-about-us">SOBRE</a></li>                       
          <li><a href="#mu-restaurant-menu">CARDÁPIO</a></li>                       
          <li><a href="#mu-reservation">RESERVAS</a></li>                       
          <li><a href="#mu-gallery">FOTOS</a></li>
          <li><a href="#mu-chef">NOSSA EQUIPE</a></li>
          <li><a href="blog.php">BLOG</a></li> 
          <li><a href="#mu-contact">CONTATOS</a></li> 
          <li><a href="sistema" target="_blank">LOGIN</a></li> 

        </ul>                            
      </div><!--/.nav-collapse -->       
    </div>          
  </nav> 
</header>
<!-- End header section -->


<!-- Start slider  -->
<section id="mu-slider">
  <div class="mu-slider-area"> 
    <!-- Top slider -->
    <div class="mu-top-slider">

      <?php 
      $query = $pdo->query("SELECT * FROM banners order by id asc");
      $res = $query->fetchAll(PDO::FETCH_ASSOC);
      for($i=0; $i < @count($res); $i++){
        foreach ($res[$i] as $key => $value){ }
          $id_reg = $res[$i]['id'];

        ?>
        <!-- Top slider single slide -->
        <div class="mu-top-slider-single">
          <img src="sistema/img/banners/<?php echo $res[$i]['imagem'] ?>" alt="img">
          <!-- Top slider content -->
          <div class="mu-top-slider-content">
            <span class="mu-slider-small-title"><?php echo $res[$i]['titulo'] ?></span>
            <h2 class="mu-slider-title"><?php echo mb_strtoupper($res[$i]['subtitulo']) ?></h2>
            <p><?php echo $res[$i]['descricao'] ?></p> 
            <?php if($res[$i]['link'] != ""){ ?>          
             <a href="<?php echo $res[$i]['link'] ?>" class="mu-readmore-btn">SAIBA MAIS</a>
           <?php } ?>
         </div>
         <!-- / Top slider content -->
       </div>
       <!-- / Top slider single slide -->    
     <?php } ?>

   </div>
 </div>
</section>
<!-- End slider  -->

<!-- Start About us -->
<section id="mu-about-us">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mu-about-us-area">
          <div class="mu-title">
            <span class="mu-subtitle">Excelência</span>
            <h2>SOBRE NÓS</h2>
            <i class="fa fa-spoon"></i>              
            <span class="mu-title-bar"></span>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="mu-about-us-left">
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam minus aliquid, itaque illum assumenda repellendus dolorem, dolore numquam totam saepe, porro delectus, libero enim odio quo. Explicabo ex sapiente sit eligendi, facere voluptatum! Quia vero rerum sunt porro architecto corrupti eaque corporis eum, enim soluta, perferendis dignissimos, repellendus, beatae laboriosam.</p>                              
               <ul>
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia.</li>                    
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia.</li>
              </ul>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque similique molestias est quod reprehenderit, quibusdam nam qui, quam magnam. Ex.</p>  
            </div>
          </div>
          <div class="col-md-6">
            <div class="mu-about-us-right">                
             <ul class="mu-abtus-slider">                 
               <li><img src="assets/img/about-us/abtus-img-1.png" alt="img"></li>
               <li><img src="assets/img/about-us/abtus-img-2.png" alt="img"></li>
               <li><img src="assets/img/about-us/abtus-img-6.png" alt="img"></li>
               <li><img src="assets/img/about-us/abtus-img-4.png" alt="img"></li>
               <li><img src="assets/img/about-us/abtus-img-5.png" alt="img"></li>
             </ul>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
</section>
<!-- End About us -->

<!-- Start Counter Section -->
<section id="mu-counter">
  <div class="mu-counter-overlay">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-counter-area">
            <ul class="mu-counter-nav">
              <li class="col-md-3 col-sm-3 col-xs-12">
                <div class="mu-single-counter">
                  <span>Pratos</span>
                  <h3><span class="counter"><?php echo $total_pratos ?></span><sup>+</sup></h3>
                  <p>Total de Pratos</p>
                </div>
              </li>
              <li class="col-md-3 col-sm-3 col-xs-12">
                <div class="mu-single-counter">
                  <span>Vinhos</span>
                  <h3><span class="counter"><?php echo $total_vinhos ?></span><sup>+</sup></h3>
                  <p>Carta de Vinhos</p>
                </div>
              </li>
              <li class="col-md-3 col-sm-3 col-xs-12">
                <div class="mu-single-counter">
                  <span>Lanches</span>
                  <h3><span class="counter">35</span><sup>+</sup></h3>
                  <p>Lanches Diversos</p>
                </div>
              </li>
              <li class="col-md-3 col-sm-3 col-xs-12">
                <div class="mu-single-counter">
                  <span>Clientes</span>
                  <h3><span class="counter">3562</span><sup>+</sup></h3>
                  <p>Satisfeitos</p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Counter Section --> 

<!-- Start Restaurant Menu -->
<section id="mu-restaurant-menu">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mu-restaurant-menu-area">
          <div class="mu-title">
            <span class="mu-subtitle">Cardápio</span>
            <h2>NOSSO MENU</h2>
            <i class="fa fa-cutlery"></i>              
            <span class="mu-title-bar"></span>
          </div>
          <div class="mu-restaurant-menu-content">
            <ul class="nav nav-tabs mu-restaurant-menu">

              <?php 
              $query = $pdo->query("SELECT * FROM categorias order by id asc");
              $res = $query->fetchAll(PDO::FETCH_ASSOC);
              for($i=0; $i < @count($res); $i++){
                foreach ($res[$i] as $key => $value){ }
                  $id_reg = $res[$i]['id'];
                $nome_cat = $res[$i]['nome'];

                if($i == 0){
                  $classe = 'active';
                }else{
                  $classe = '';
                }

                ?>

                <li class="<?php echo $classe ?>" style="margin-bottom: 10px; "><a style="border-bottom: 1px solid #c1a35a;" href="#" onclick="mostrarProdutos(<?php echo $id_reg ?>)" data-toggle="tab"><?php echo $nome_cat ?></a></li>
              <?php } ?>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane fade in active" id="breakfast">
                <div class="mu-tab-content-area">


                  <div class="row">
                                        
                        <ul class="mu-menu-item-nav">
                       <div id="listar-produtos">


                           


                        </div>  
                        </ul>   
                     
                                  


                </div>



              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<!-- End Restaurant Menu -->






<!-- Start Reservation section -->
<section id="mu-reservation">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mu-reservation-area">
          <div class="mu-title">
            <span class="mu-subtitle">Faça sua</span>
            <h2>Reserva de Mesa</h2>
            <i class="fa fa-spoon"></i>              
            <span class="mu-title-bar"></span>
          </div>
          <div class="mu-reservation-content">
            <p>Faça sua reserva com pelo menos 3 horas de antecedência, caso contrário consulte disponibilidade!</p>
            <form class="mu-reservation-form" method="post" action="reservar.php"> 
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">                       
                    <input type="text" class="form-control" name="nome" placeholder="Nome Completo" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">                        
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">                        
                    <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Telefone Celular">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="number" class="form-control" name="pessoas" placeholder="Quantidade Pessoas" required>              
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="date" class="form-control" name="data" 
                    placeholder="Data" required>              
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <textarea class="form-control" cols="30" rows="10" name="mensagem" placeholder="Sua Mensagem ou Comentário"></textarea>
                  </div>
                </div>
                <button type="submit" class="mu-readmore-btn">Reservar</button>
              </div>
            </form>      
          </div>
        </div>
      </div>
    </div>
  </div>
</section>  
<!-- End Reservation section -->

<!-- Start Gallery -->
<section id="mu-gallery">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mu-gallery-area">
          <div class="mu-title">
            <span class="mu-subtitle">Galeria</span>
            <h2>Nossas Fotos</h2>
            <i class="fa fa-spoon"></i>              
            <span class="mu-title-bar"></span>
          </div>
          <div class="mu-gallery-content">
            <div class="mu-gallery-top">
              <!-- Start gallery menu -->
              <ul>
                <li class="filter active" data-filter="all">TODAS</li>

                <?php 
                $query = $pdo->query("SELECT * FROM categorias_img order by id asc");
                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                for($i=0; $i < @count($res); $i++){
                  foreach ($res[$i] as $key => $value){ }
                    $id_reg = $res[$i]['id'];
                  $nome_cat = $res[$i]['nome'];

                  ?>

                  <li class="filter" data-filter=".<?php echo $nome_cat ?>"><?php echo $nome_cat ?></li>

                <?php } ?>

              </ul>
            </div>
            <!-- Start gallery image -->
            <div class="mu-gallery-body" id="mixit-container">


             <?php 
             $query = $pdo->query("SELECT * FROM imagens order by id desc limit $maximo_imagens_galeria_index");
             $res = $query->fetchAll(PDO::FETCH_ASSOC);
             for($i=0; $i < @count($res); $i++){
              foreach ($res[$i] as $key => $value){ }
                $id_reg = $res[$i]['id'];
              $cat_img = $res[$i]['categoria'];

              $query2 = $pdo->query("SELECT * FROM categorias_img where id = '$cat_img'");
              $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
              $nome_cat_img = $res2[0]['nome'];

              ?>

              <!-- start single gallery image -->
              <div class="mu-single-gallery col-md-4 mix <?php echo $nome_cat_img ?>">
                <div class="mu-single-gallery-item">
                  <figure class="mu-single-gallery-img">
                    <a href="#"><img alt="img" src="sistema/img/galeria/<?php echo $res[$i]['imagem'] ?>"></a>
                  </figure>
                  <div class="mu-single-gallery-info">
                    <a href="sistema/img/galeria/<?php echo $res[$i]['imagem'] ?>" data-fancybox-group="gallery" class="fancybox">
                      <img src="assets/img/plus.png" alt="plus icon img">
                    </a>
                  </div>                  
                </div>
              </div>
              <!-- End single gallery image -->

            <?php } ?>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<!-- End Gallery -->

<!-- Start Client Testimonial section -->
<section id="mu-client-testimonial">
  <div class="mu-overlay">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-client-testimonial-area">
            <div class="mu-title">
              <span class="mu-subtitle">Testemunhos</span>
              <h2>Nossos Clientes</h2>
              <i class="fa fa-spoon"></i>              
              <span class="mu-title-bar"></span>
            </div>
            <!-- testimonial content -->
            <div class="mu-testimonial-content">
              <!-- testimonial slider -->
              <ul class="mu-testimonial-slider">
                <li>
                  <div class="mu-testimonial-single">                   
                    <div class="mu-testimonial-info">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate consequuntur ducimus cumque iure modi nesciunt recusandae eligendi vitae voluptatibus, voluptatum tempore, ipsum nisi perspiciatis. Rerum nesciunt fuga ab natus, dolorem?</p>
                    </div>
                    <div class="mu-testimonial-bio">
                      <p>- David Muller</p>                      
                    </div>
                  </div>
                </li>
                <li>
                  <div class="mu-testimonial-single">                   
                    <div class="mu-testimonial-info">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate consequuntur ducimus cumque iure modi nesciunt recusandae eligendi vitae voluptatibus, voluptatum tempore, ipsum nisi perspiciatis. Rerum nesciunt fuga ab natus, dolorem?</p>
                    </div>
                    <div class="mu-testimonial-bio">
                      <p>- David Muller</p>                      
                    </div>
                  </div>
                </li>
                <li>
                  <div class="mu-testimonial-single">                   
                    <div class="mu-testimonial-info">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate consequuntur ducimus cumque iure modi nesciunt recusandae eligendi vitae voluptatibus, voluptatum tempore, ipsum nisi perspiciatis. Rerum nesciunt fuga ab natus, dolorem?</p>
                    </div>
                    <div class="mu-testimonial-bio">
                      <p>- David Muller</p>                      
                    </div>
                  </div>
                </li>
                <li>
                  <div class="mu-testimonial-single">                   
                    <div class="mu-testimonial-info">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate consequuntur ducimus cumque iure modi nesciunt recusandae eligendi vitae voluptatibus, voluptatum tempore, ipsum nisi perspiciatis. Rerum nesciunt fuga ab natus, dolorem?</p>
                    </div>
                    <div class="mu-testimonial-bio">
                      <p>- David Muller</p>                      
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Client Testimonial section -->



<!-- Start Chef Section -->
<section id="mu-chef">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mu-chef-area">
          <div class="mu-title">
            <span class="mu-subtitle">Nossos Profissionais</span>
            <h2>MASTER CHEFS</h2>
            <i class="fa fa-spoon"></i>              
            <span class="mu-title-bar"></span>
          </div>
          <div class="mu-chef-content">
            <ul class="mu-chef-nav">

             <?php 
             $query = $pdo->query("SELECT * FROM chef order by id asc");
             $res = $query->fetchAll(PDO::FETCH_ASSOC);
             for($i=0; $i < @count($res); $i++){
              foreach ($res[$i] as $key => $value){ }
                $id_reg = $res[$i]['id'];
              $funcionario = $res[$i]['funcionario'];

              $query2 = $pdo->query("SELECT * FROM funcionarios where id = '$funcionario'");
              $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
              $nome_func = $res2[0]['nome'];


              ?>

              <li>
                <div class="mu-single-chef">
                  <figure class="mu-single-chef-img">
                    <img src="sistema/img/chef/<?php echo $res[$i]['imagem'] ?>" alt="chef img">
                  </figure>
                  <div class="mu-single-chef-info">
                    <h4><?php echo $nome_func ?></h4>
                    <span><?php echo $res[$i]['especialidade'] ?></span>
                  </div>
                  <div class="mu-single-chef-social">
                    <?php if($res[$i]['facebook'] != ""){ ?>
                      <a href="<?php echo $res[$i]['facebook'] ?>" target="_blank"><i class="fa fa-facebook" title="Facebook" ></i></a>
                    <?php } ?>
                    <?php if($res[$i]['instagram'] != ""){ ?>
                      <a href="<?php echo $res[$i]['instagram'] ?>" target="_blank"><i class="fa fa-instagram" title="Instagram"></i></a>
                    <?php } ?>
                    <?php if($res[$i]['youtube'] != ""){ ?>
                     <a href="<?php echo $res[$i]['youtube'] ?>" target="_blank"><i class="fa fa-youtube" title="YouTube"></i></a>
                   <?php } ?>
                   <?php if($res[$i]['linkedin'] != ""){ ?>
                     <a href="<?php echo $res[$i]['linkedin'] ?>" target="_blank"><i class="fa fa-linkedin" title="Linkedin"></i></a>
                   <?php } ?>
                 </div>
               </div>
             </li>

           <?php } ?>

         </ul>
       </div>
     </div>
   </div>
 </div>
</div>
</section>
<!-- End Chef Section -->

<!-- Start Latest News -->
<section id="mu-latest-news">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mu-latest-news-area">
          <div class="mu-title">
            <span class="mu-subtitle">Nosso Blog</span>
            <h2>ÚLTIMAS POSTAGENS</h2>
            <i class="fa fa-spoon"></i>              
            <span class="mu-title-bar"></span>
          </div>
          <div class="mu-latest-news-content">
            <div class="row">


             <?php 
             $query = $pdo->query("SELECT * FROM blog order by id desc limit 2");
             $res = $query->fetchAll(PDO::FETCH_ASSOC);
             for($i=0; $i < @count($res); $i++){
              foreach ($res[$i] as $key => $value){ }
                $id_reg = $res[$i]['id'];
              $usuario = $res[$i]['author'];
              $data = $res[$i]['data'];

              $data = implode('/', array_reverse(explode('-', $data)));

              $query2 = $pdo->query("SELECT * FROM usuarios where id = '$usuario'");
              $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
              $nome_usuario = $res2[0]['nome'];


              ?>



              <!-- start single blog -->
              <div class="col-md-6">
                <article class="mu-news-single">
                  <h3><a href="blog-post.php?titulo=<?php echo $res[$i]['url_titulo'] ?>"><?php echo $res[$i]['titulo'] ?></a></h3>
                  <figure class="mu-news-img">
                    <a href="#"><img src="sistema/img/blog/<?php echo $res[$i]['imagem'] ?>" alt="img"></a>                      
                  </figure>
                  <div class="mu-news-single-content">                      
                    <ul class="mu-meta-nav">
                      <li>Author: <?php echo $nome_usuario ?></li>
                      <li>Data: <?php echo $data ?></li>
                    </ul>
                    <p style="height:80px; overflow: auto;" ><?php echo $res[$i]['descricao_1']; ?></p>
                    <div class="mu-news-single-bottom">
                      <a href="blog-post.php?titulo=<?php echo $res[$i]['url_titulo'] ?>" class="mu-readmore-btn">Veja Mais</a>
                    </div>
                  </div>                   
                </article>
              </div>

            <?php } ?>




          </div>

        </div>
      </div>
    </div>
  </div>
</div>
</section>
<!-- End Latest News -->

<!-- Start Contact section -->
<section id="mu-contact">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mu-contact-area">
          <div class="mu-title">

            <h2>CONTATE-NOS</h2>
            <i class="fa fa-spoon"></i>              
            <span class="mu-title-bar"></span>
          </div>
          <div class="mu-contact-content">
            <div class="row">
              <div class="col-md-6">
                <div class="mu-contact-left">
                  <form class="mu-contact-form" action="enviar.php" method="post">
                    <div class="form-group">
                      <label for="name">Seu Nome</label>
                      <input type="text" class="form-control" name="nome_contato" id="name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email_contato" id="email" placeholder="Email" required>
                    </div>                      
                    
                    <div class="form-group">
                      <label for="message">Messagem</label>                        
                      <textarea class="form-control" id="message" cols="30" rows="10" name="mensagem_contato" placeholder="Sua Mensagem" required></textarea>
                    </div>                      
                    <button type="submit" class="mu-send-btn">Enviar</button>
                  </form>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mu-contact-right">
                  <div class="mu-contact-widget">
                    <h3>Endereço</h3>
                    <p>Entre em contato conosco, retornaremos via e-mail, mande-nos qualquer dúvida que tenha ou sugestão.</p>
                    <address>
                      <p><i class="fa fa-phone"></i> Fixo <?php echo $telefone_fixo ?> </p>
                      <a href="http://api.whatsapp.com/send?1=pt_BR&phone=<?php echo $telefone_whatsapp_link ?>" title="Ir para o Whatsapp" class="text-dark">
                        <p><i class="fa fa-whatsapp"></i> Whatsapp <?php echo $telefone_whatsapp ?> </p></a>
                        <p><i class="fa fa-envelope-o"></i><?php echo $email_adm ?></p>
                        <p><i class="fa fa-map-marker"></i><?php echo $endereco_site ?></p>
                      </address>
                    </div>
                    <div class="mu-contact-widget">
                      <h3>Horário de Funcionamento</h3>                      
                      <address>
                        <p><span>Segunda - Sexta</span> 18:00 às 00:00</p>
                        <p><span>Sábado</span> 15:00 às 01:00</p>
                        <p><span>Domingo</span> 11:00 às 00:00</p>
                      </address>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact section -->

  <!-- Start Map section -->
  <section id="mu-map">
   <iframe src="https://www.google.com/maps/place/Senac+Rond%C3%B4nia+(Esplanada)/data=!4m2!3m1!1s0x0:0xc32a15bc78d82706?sa=X&ved=1t:2428&ictx=1" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
 </section>
 <!-- End Map section -->

 <?php require_once("rodape.php"); ?>

 <!-- jQuery library -->
 <script src="assets/js/jquery.min.js"></script>  
 <!-- Include all compiled plugins (below), or include individual files as needed -->
 <script src="assets/js/bootstrap.js"></script>   
 <!-- Slick slider -->
 <script type="text/javascript" src="assets/js/slick.js"></script>
 <!-- Counter -->
 <script type="text/javascript" src="assets/js/waypoints.js"></script>
 <script type="text/javascript" src="assets/js/jquery.counterup.js"></script>
 <!-- Date Picker -->
 <script type="text/javascript" src="assets/js/bootstrap-datepicker.js"></script> 
 <!-- Mixit slider -->
 <script type="text/javascript" src="assets/js/jquery.mixitup.js"></script>
 <!-- Add fancyBox -->        
 <script type="text/javascript" src="assets/js/jquery.fancybox.pack.js"></script>

 <!-- Custom js -->
 <script src="assets/js/custom.js"></script>

 <!-- Mascaras JS -->
 <script type="text/javascript" src="assets/js/mascaras.js"></script>

 <!-- Ajax para funcionar Mascaras JS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script> 






</body>
</html>



<script type="text/javascript">
          $(document).ready(function() {
          mostrarProdutos(0);
        } );
      </script>


<script type="text/javascript">
  function mostrarProdutos(idcat){
    $.ajax({
            url: "listar-produtos.php",
            method: 'POST',
            data: {idcat},
            dataType: "html",

            success:function(result){
              $("#listar-produtos").html(result);
            }
          });
  }
</script>
