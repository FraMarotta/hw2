<!DOCTYPE html>
<html>
    <head>
        <title>Si Viaggia</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo e(asset('styles/style.css')); ?>" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@300&family=Inspiration&family=Rubik:wght@300&display=swap" rel="stylesheet">
        <script>
            const BASE_URL = "<?php echo e(url('/')); ?>";
        </script>
        <script src="<?php echo e(asset('scripts/covid.js')); ?>" defer="true"></script>
        <script src="<?php echo e(asset('scripts/load_home.js')); ?>" defer="true"></script>
        <script src="<?php echo e(asset('scripts/search.js')); ?>" defer="true"></script>
    </head>

    <body>
      <article id="modale" class="hidden"> 
      </article>
        <header>
            <div id="overlay"></div>
            
            <nav>
              <div id="logo">
                <img src="<?php echo e(asset('images/logo.png')); ?>">
              </div>
              <?php if(session('Username')): ?>
              <div class='welcome'> Benvenuto <?php echo e(session('Username')); ?> </div>
      
              <div id="links">
                <a href = "<?php echo e(asset('favorites')); ?>"><img src="<?php echo e(asset('images/like_d.svg')); ?>"></a>
                <div>
                  <a  href="<?php echo e(asset('logged_home/')); ?>">Home</a>
                  <a  href="<?php echo e(asset('home')); ?>">LOGOUT</a>
                </div>
                <?php endif; ?>
              </div>
            </nav>
            <h1>
              <em>Il turismo riparte!</em><br/>
              <strong>SCOPRI LE NOSTRE OFFERTE</strong><br/>
              <form id ='search_content'><input type = "search" class="oval" id = "barra" placeholder = "Cerca una meta"></input></form>
            </h1>
            <a id = "covid">News COVID-19</a>
          </header>

          <section>
            <div id="main">
              <h1>Lasciati Ispirare</h1>
              <p>
                Le mete che ti consiglia il nostro staff!
              </p>
            </div>
            <div class="Info"> 
              <div class="boxes_img">  </div>
              <div class="boxes_img_mobile"> </div>
              <div class="boxes_txt" >
                
              </div>
            </div>
            <div class="Info">
              <div class="boxes_img_mobile"> </div>
              <div class="boxes_txt" >
                
              </div>
              <div class="boxes_img"> </div>

            </div>
            <div class="Info">
              <div class="boxes_img_mobile"> </div>
              <div class="boxes_img"> </div>
              <div class="boxes_txt" >
                
              </div>
            </div>

            <div class="Info">
              <div class="boxes_img_mobile"> </div>
              <div class="boxes_txt" >
                
              </div>
              <div class="boxes_img"></div>

            </div>


            <article id="modale" class="hidden"> 
          
            </article>
          </section>

          <footer>
              <span>Francesco Marotta 1000001522 ©</span>
          </footer>

    </body>
</html><?php /**PATH C:\xampp\htdocs\WebProgramming\Homework\HW2\resources\views/logged_home.blade.php ENDPATH**/ ?>