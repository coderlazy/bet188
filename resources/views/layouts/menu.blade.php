<div class="nav-holder">
    <div class="logo-holder">
        <img src="/img/me.png" alt="" style="width: 25px;">					
    </div>
    <!-- Indicators -->
    <ol class="carousel-indicators" style="display: block;"> 
        <a data-target="#myCarousel" data-slide-to="0" class="active"><span class="transition"></span>Home</a>
        <a data-target="#myCarousel" data-slide-to="1"><span class="transition"></span>About</a>
        <a data-target="#myCarousel" data-slide-to="2"><span class="transition"></span>Work</a>
        <a data-target="#myCarousel" data-slide-to="3"><span class="transition"></span>Contact</a>
        <a href="#"><span class="transition"></span>Blog</a>
    </ol>
</div>
<!--Carousel Bootstrap-->
<div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
               @include('layouts.videos');
                <div class="carousel-caption">
                    <div class="tlt" style="font-size: 60px" >Xin Chào! Mình là Cương Bùi</div>
                </div>
            </div>

            <div class="item">
                <img  src="/img/example_2.jpg" alt="Chania" class="full-screen-background-image">
                <div class="carousel-caption">
                    <h3>Chania</h3>
                    <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
                </div>
            </div>

            <div class="item">
                <img  src="/img/example_3.jpg" alt="Flower" class="full-screen-background-image">
                <div class="carousel-caption">
                    <h3>Flowers</h3>
                    <p>Beatiful flowers in Kolymbari, Crete.</p>
                </div>
            </div>

            <div class="item">
                <img  src="/img/example_4.jpg" alt="Flower" class="full-screen-background-image">
                <div class="carousel-caption">
                    <h3>Flowers</h3>
                    <p>Beatiful flowers in Kolymbari, Crete.</p>
                </div>
            </div>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<script type="text/javascript">
    var vid = document.getElementById("bgvid");
    var pauseButton = document.querySelector("#polina button");

    function vidFade() {
        vid.classList.add("stopfade");
    }

    vid.addEventListener('ended', function ()
    {
// only functional if "loop" is removed 
        vid.pause();
// to capture IE10
        vidFade();
    });


    pauseButton.addEventListener("click", function () {
        vid.classList.toggle("stopfade");
        if (vid.paused) {
            vid.play();
            pauseButton.innerHTML = "Pause";
        } else {
            vid.pause();
            pauseButton.innerHTML = "Paused";
        }
    })

</script>