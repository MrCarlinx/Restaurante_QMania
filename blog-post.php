<?php require_once("conexao.php");

@session_start();
$id_usuario = @$_SESSION['id'];
$nivel_usuario = @$_SESSION['nivel'];

$titulo = $_GET['titulo'];

$query = $pdo->query("SELECT * FROM blog where url_titulo = '$titulo'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);

$id_reg = $res[0]['id'];
$usuario = $res[0]['author'];
$data = $res[0]['data'];
$palavras = $res[0]['palavras'];
$visitas = $res[0]['visitas'];
$visitas = $visitas + 1;

$pdo->query("UPDATE blog set visitas = '$visitas' where url_titulo = '$titulo'");

$data = implode('/', array_reverse(explode('-', $data)));

$query2 = $pdo->query("SELECT * FROM usuarios where id = '$usuario'");
$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
$nome_usuario = $res2[0]['nome'];



//total de comentários
$query2 = $pdo->query("SELECT * FROM comentarios where post = '$id_reg'");
$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
$total_coment = @count($res2);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 

  <meta name="description" content="<?php echo $palavras ?>"> 

  <title>Blog - <?php echo $nome_site ?></title>

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
    <!-- Pre Loader -->
    <div id="aa-preloader-area">
      <div class="mu-preloader">
        <img src="assets/img/preloader2.gif" alt=" loader img">
      </div>
    </div>
    <!-- SCROLL TOP BUTTON -->
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
              <li><a href="index.php">HOME</a></li>
              <li><a href="blog.php">BLOG</a></li>                       

            </ul>                            
          </div><!--/.nav-collapse -->       
        </div>          
      </nav> 
    </header>
    <!-- End header section --> 

    <!-- Start Blog banner  -->
    <section id="mu-blog-banner">
      <div class="container">
        <div class="mu-blog-banner-area">

        </div>
      </div>
    </section>
    <!-- End Blog banner -->  

    <!-- Start Blog -->
    <section id="mu-blog">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="mu-blog-area">
              <div class="row">
                <div class="col-md-8 col-sm-8">
                  <div class="mu-blog-content mu-blog-details">
                    <!-- Start Single blog item -->
                    <article class="mu-news-single">
                      <h2><a><?php echo $res[0]['titulo'] ?></a> </h2>
                      <figure class="mu-news-img">
                        <a href="#"><img src="sistema/img/blog/<?php echo $res[0]['imagem'] ?>" alt="img"></a>                      
                      </figure>
                      <div class="mu-news-single-content">                      
                        <ul class="mu-meta-nav">
                          <li>Author: <?php echo $nome_usuario ?></li>
                          <li>Data: <?php echo $data ?></li>
                         <li> Visitas (<?php echo $visitas ?>)</li>
                        </ul>
                        <p><?php echo $res[0]['descricao_1'] ?></p>
                        <p><?php echo $res[0]['descricao_2'] ?></p>
                        <blockquote>
                         <p><?php echo $res[0]['descricao_3'] ?></p>
                         <cite> - <?php echo $nome_usuario ?></cite>
                       </blockquote>    
                       

                     </div>


                   </article>
                   <!-- End Single blog item -->                  
                 </div>
                 <!-- Start Blog navigation -->

                 <!-- End Blog navigation -->


               </div>
               <!-- Start Blog Sidebar -->
               <div class="col-md-4 col-sm-4">             
                <aside class="mu-blog-sidebar">
                  <!-- Blog Sidebar Single -->
                  <div class="mu-blog-sidebar-single">
                    <h3>Categorias</h3>
                    <ul class="mu-catg-nav">
                      <?php 
                      $query = $pdo->query("SELECT * FROM categorias order by nome asc");
                      $res = $query->fetchAll(PDO::FETCH_ASSOC);
                      for($i=0; $i < @count($res); $i++){
                        foreach ($res[$i] as $key => $value){ }
                         ?>
                       <li><a href="index.php#mu-restaurant-menu"><?php echo $res[$i]['nome'] ?></a></li>

                     <?php } ?>

                   </ul>
                 </div>
                 <!-- End Blog Sidebar Single -->
                 <!-- Blog Sidebar Single -->
                 <div class="mu-blog-sidebar-single">
                  <h3>Postagens Recentes</h3>
                  <ul class="mu-recent-news-nav">

                   <?php 
                   $query = $pdo->query("SELECT * FROM blog order by id desc");
                   $res = $query->fetchAll(PDO::FETCH_ASSOC);
                   for($i=0; $i < @count($res); $i++){
                    foreach ($res[$i] as $key => $value){ }
                     ?>

                   <li><a href="blog-post.php?titulo=<?php echo $res[$i]['url_titulo'] ?>"><?php echo $res[$i]['titulo'] ?></a></li>

                 <?php } ?>

               </ul>
             </div>
             <!-- End Blog Sidebar Single -->

             <!-- End Blog Sidebar Single -->
           </aside>
         </div>
         <!-- End Blog Sidebar -->
       </div>
     </div>
   </div>
 </div>



 <!-- Start Blog comments thread -->
 <div class="row">
  <div class="col-md-8">
    <div class="mu-comments-area">
      <h3><?php echo $total_coment ?> Comentários</h3>
      <div class="comments">
        <ul class="commentlist">

            <?php 
                   $query = $pdo->query("SELECT * FROM comentarios where post = '$id_reg' order by id desc");
                   $res = $query->fetchAll(PDO::FETCH_ASSOC);
                   for($i=0; $i < @count($res); $i++){
                    foreach ($res[$i] as $key => $value){ }

                      $data_post = $res[$i]['data'];
                    $id_coment =  $res[$i]['id'];

                    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                  date_default_timezone_set('America/Sao_Paulo');
                $data_post = utf8_encode(strftime('%A, %d de %B de %Y', strtotime($data_post)));
                     ?>

          <li>
            <div class="media">

              <div class="media-body">
               <h4 class="author-name"><?php echo $res[$i]['nome'] ?>
                  
                  <?php if($nivel_usuario == 'Administrador' || $id_usuario == $usuario){ ?>
                 <a href="blog-post.php?titulo=<?php echo $titulo ?>&funcao=excluir&id=<?php echo $id_coment ?>" title="Excluir Comentário">
               <i class="fa fa-trash text-danger ml-4"></i></a>

                <?php } ?>

               </h4>
               <span class="comments-date"> Postado em <?php echo $data_post ?> às <?php echo $res[$i]['hora'] ?></span>
               <p><?php echo $res[$i]['comentario'] ?></p>

             </div>
           </div>
         </li>

       <?php } ?>


       </ul>
       <!-- comments pagination -->

     </div>
   </div>
 </div>

 <!-- Start Blog comments thread -->
 <!-- Start comments box -->

 <div class="col-md-4">
  <div id="respond">
    <h3 class="reply-title">Faça seu Comentário</h3>
    <form id="commentform" method="post">

      <p class="comment-form-author">
        <label for="author">Nome <span class="required">*</span></label>
        <input class="form-control" type="text" name="nome" value="" size="30" required="required">
      </p>
      <p class="comment-form-email">
        <label for="email">Email <span class="required">*</span></label>
        <input type="email" name="email" value="" aria-required="true" required="required">
      </p>

      <p class="comment-form-comment">
        <label for="comment">Comment</label>
        <textarea maxlength="500" name="comentario" cols="45" rows="8" aria-required="true" required="required"></textarea>
      </p>

      <p class="form-submit">
        <input type="submit" name="submit" class="mu-send-btn" value="Comentar">
      </p>        
    </form>
  </div>
</div>
</div>

<!-- End comments box -->


</div>
</section>
<!-- End Blog -->


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

</body>
</html>



<?php if(isset($_POST['submit'])){

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $comentario = $_POST['comentario'];
  $post = $id_reg;

  $query = $pdo->prepare("INSERT INTO comentarios SET nome = :nome, email = :email, comentario = :comentario, post = :post, data = curDate(), hora = curTime()");
  $query->bindValue(":nome", "$nome");
  $query->bindValue(":email", "$email");
  $query->bindValue(":comentario", "$comentario");
  $query->bindValue(":post", "$post");

  $query->execute();

  echo "<script language='javascript'>window.location='blog-post.php?titulo=$titulo'</script>";

}
?>



<?php if(@$_GET['funcao'] == 'excluir'){

  $id_com = @$_GET['id'];

  $pdo->query("DELETE from comentarios where id = '$id_com'");

  echo "<script language='javascript'>window.location='blog-post.php?titulo=$titulo'</script>";

}
?>