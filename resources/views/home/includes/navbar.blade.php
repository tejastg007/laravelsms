<header>
    <div class="navbar">
        <div class="logo">
            <h2>madcraft</h2>
        </div>
        <div class="navitems" id="navitems">
            <a href="javascript:void(0)" class="fas fa-times" id="close-nav" onclick="closes()"></a>
            <a href="#home">home</a>
            <a href="#education">education</a>
            <a href="#services">services</a>
            <a href="#gallery">gallery</a>
            <a href="#about">about</a>
            <a href="#contact">contact us</a>
        </div>


        <a href="javascript:void(0)" class="fas fa-bars" id="open-nav" onclick="opens()"></a>
    </div>

</header>
<script>
    function opens() {
        document.getElementById("navitems").style.right = "-40px"
    }

    function closes() {
        document.getElementById("navitems").style.right = "-250px"
    }

    window.onclick = function(event) {
        if (!event.target.matches('#close-nav') && !event.target.matches('#open-nav')) {
            closes();
        }
    }
</script>
