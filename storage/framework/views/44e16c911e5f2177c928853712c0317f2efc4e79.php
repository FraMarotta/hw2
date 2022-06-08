<!DOCTYPE html>
<html>
    <head>
        <title> Cerca meta</title>
        <link rel="stylesheet" href="<?php echo e(asset('styles/search_style.css')); ?>"/>
        <script>
            const BASE_URL = "<?php echo e(url('/')); ?>";
        </script>
        <script src="<?php echo e(asset('scripts/load_search.js')); ?>" defer="true"></script>
    </head>

    <body>  
        <section>
            <?php if(isset($meta)): ?>
            <input type="hidden" id="hiddenInfo" value = <?php echo e(strtoupper($meta)); ?> >
            <a  href="<?php echo e(asset('logged_home')); ?>">Home</a>
            <div class='user'> <?php echo e(session('Username')); ?></div>
            <div class= 'city'> <?php echo e($meta); ?> </div>
            <?php endif; ?> <!--passo la destinazione al file js per caricare la pagina-->
            
            
        </section>
        <?php if(!$isPresent): ?>
        <form action='../add_prefer/<?php echo e($meta); ?>' method = 'get'>
            <button class> Città Preferita </button>
        </form>
        <?php endif; ?>
            <!-- Slideshow container -->
        <div class="slideshow-container">

        <!-- Full-width images with number added by js-->
                    
        <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>
        <footer>
              <span>Francesco Marotta 1000001522 ©</span>
        </footer>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\WebProgramming\Homework\HW2\resources\views/search.blade.php ENDPATH**/ ?>