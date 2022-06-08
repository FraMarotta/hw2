<!DOCTYPE html>
<html>
    <head>
        <title> Cerca meta</title>
        <link rel="stylesheet" href="{{asset('styles/search_style.css')}}"/>
        <script>
            const BASE_URL = "{{url('/')}}";
        </script>
        <script src="{{asset('scripts/load_search.js')}}" defer="true"></script>
    </head>

    <body>  
        <section>
            @if(isset($meta))
            <input type="hidden" id="hiddenInfo" value = {{strtoupper($meta)}} >
            <a  href="{{asset('logged_home')}}">Home</a>
            <div class='user'> {{session('Username')}}</div>
            <div class= 'city'> {{$meta}} </div>
            @endif <!--passo la destinazione al file js per caricare la pagina-->
            
            
        </section>
        @if(!$isPresent)
        <form action='../add_prefer/{{$meta}}' method = 'get'>
            <button class> Città Preferita </button>
        </form>
        @endif
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
