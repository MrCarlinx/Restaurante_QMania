<!-- Start Footer -->
  <footer id="mu-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <div class="mu-footer-area">
           <div class="mu-footer-social">
            <?php if($facebook != ""){
              echo '<a href="'.$facebook.'" target="_blank" title="Visitar Facebook"><span class="fa fa-facebook"></span></a>';
            } ?>

             <?php if($twitter != ""){
              echo '<a href="'.$twitter.'" target="_blank" title="Visitar Twitter"><span class="fa fa-twitter"></span></a>';
            } ?>

             <?php if($instagram != ""){
              echo '<a href="'.$instagram.'" target="_blank" title="Visitar Instagram"><span class="fa fa-instagram"></span></a>';
            } ?>

             <?php if($googleplus != ""){
              echo '<a href="'.$googleplus.'" target="_blank" title="Visitar Google +"><span class="fa fa-google-plus"></span></a>';
            } ?>

             <?php if($youtube != ""){
              echo '<a href="'.$youtube.'" target="_blank" title="Visitar Youtube"><span class="fa fa-youtube"></span></a>';
            } ?>
            
                  
           
           
          </div>
          <div class="mu-footer-copyright">
            <small>
            <p><span class="mr-4"><?php echo $endereco_site ?>  </span>
              <span class="ml-4">
            <a href="http://api.whatsapp.com/send?1=pt_BR&phone=<?php echo $telefone_whatsapp_link ?>" title="Ir para o Whatsapp" class="text-dark">
                        <i class="fa fa-whatsapp"></i> Whatsapp <?php echo $telefone_whatsapp ?> </a></span></p></small>
          </div>         
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- End Footer -->