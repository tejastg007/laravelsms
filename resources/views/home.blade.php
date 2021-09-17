<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Madcraft multitasking firm</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@200;800&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css' />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />

</head>

<body>
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


    <section id="home" class="section home">
        <div class="home-section">
            <h3>Hi, welcome to</h3>
            <h1>madcraft multitasking firm</h1>
            <h4>A leading educational institute and service portal !</h4>
        </div>
        <p class="mad">MADCRAFT</p>
    </section>

    <section id="education" class="section education ">
        <h1 class="section-heading">EDUCATION</h1>
        <hr class="hr">
        <div class="container">
            <div class="row edu-course mb-5 wow animate__animated animate__fadeIn">
                <div class="col-lg-4 col-10  mx-auto mb-5">
                    <img src="homepageimages/advance learning.jpg" alt="">
                </div>
                <div class="col-lg-8 col-10 mx-auto pl-0 pl-lg-4 p-md-3">
                    <h3 class="font-weight-bold text-white">Advance Computer Education</h2>
                        <p class="text-white" style="line-height: 30px;">We, at madcraft multitasking firm help student
                            to learn the computer system and concept from very basics to advanced level. We provide
                            student all type of courses, student can choose from basic to advanced level and every
                            course is available at very affordable price so that anyone can take benefit of it.</p>
                </div>
            </div>

            <div class="row edu-course mb-5 wow animate__animated animate__fadeIn">
                <div class="col-lg-4 col-10 order-lg-2 mx-auto mb-5">
                    <img src="homepageimages/accounting.jpg" alt="">
                </div>
                <div class="col-lg-8 col-10 mx-auto pl-0 pl-lg-4 order-lg-1 p-md-3">
                    <h3 class="font-weight-bold text-white">Complete Accounting Learning </h2>
                        <p class="text-white" style="line-height: 30px;">Staff at madcraft multitasking firm has hands
                            on experience in the accounting field. Everyone is expert in accounting because of real
                            world experience. It will help student to understand the real world concepts.</p>
                </div>
            </div>

            <div class="row edu-course mb-5 wow animate__animated animate__fadeIn">
                <div class="col-lg-4 col-10 mx-auto mb-5">
                    <img src="homepageimages/practical knowledge.png" alt="">
                </div>
                <div class="col-lg-8 col-10 mx-auto pl-0 pl-lg-4 p-md-3  ">
                    <h3 class="font-weight-bold text-white">Practical Knowledge</h2>
                        <p class="text-white" style="line-height: 30px;">We believe that practical knowledge is as
                            important as the theory knowledge and it help students more while working at the industry
                            level. So, we focus on conducting the practical sessions more than the theory sessions. </p>
                </div>
            </div>
        </div>
        <div style="visibility: hidden;">hi</div>
    </section>


    <section id="services" class="section services">
        <h1 class="section-heading"> E-SERVICES MART</h1>
        <hr class="hr">
        <div class="container-fluid">
            <div class="row justify-content-around mb-lg-5 mb-0">
                <div class="card col-lg-3 col-8 p-0 wow animate__animated animate__fadeIn mb-5">
                    <div class="card-header text-center">SBI Zero account</div>
                    <div class="card-body">We are offical partner of the State Bank of India and help people to open the
                        zero balance account.
                    </div>
                    <div class="card-footer">footer</div>
                </div>
                <div class="card col-lg-3 col-8 p-0 wow animate__animated animate__fadeIn mb-5">
                    <div class="card-header text-capital text-center ">shop act license</div>
                    <div class="card-body">We help customers to create a shop act license for their new shop in no extra
                        charges</div>
                    <div class="card-footer"></div>
                </div>
                <div class="card col-lg-3 col-8 p-0 wow animate__animated animate__fadeIn mb-5">
                    <div class="card-header">Udyam-aadhar registration</div>
                    <div class="card-body">We can complete an udyam-aadhar registration for the customers's new business
                        instantly</div>
                    <div class="card-footer"></div>
                </div>
            </div>

            <div class="row justify-content-around">
                <div class="card col-lg-3 col-8 p-0 wow animate__animated animate__fadeIn mb-5">
                    <div class="card-header">income tax return</div>
                    <div class="card-body">We are highly experienced in the Accounting, income tax returning, GST and
                        other good stuff.
                    </div>
                    <div class="card-footer">footer</div>
                </div>
                <div class="card col-lg-3 col-8 p-0 wow animate__animated animate__fadeIn mb-5">
                    <div class="card-header">GST registration</div>
                    <div class="card-body">We can easily complete your GST registration without any extra charges and
                        that too fast!</div>
                    <div class="card-footer"></div>
                </div>
                <div class="card col-lg-3 col-8 p-0 wow animate__animated animate__fadeIn mb-5">
                    <div class="card-header">PAN Center</div>
                    <div class="card-body">Madcraft multitasking firm has officially partnered with government to help
                        creating new pan cards without extra charges</div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
        <script>
            var card = document.getElementsByClassName("card-footer");
            for (var i = 0; i < card.length; i++) {
                card[i].innerHTML = "<a href='tel:+917776999440' >call us</a>";
            }
        </script>
    </section>


    <section class="section gallery" id="gallery">
        <h1 class="section-heading">GALLERY</h1>
        <hr class="hr">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="homepageimages/back vidow.jpg" alt=""
                        class="wow animate__animated animate__fadeIn "></div>
                <div class="swiper-slide"><img src="homepageimages/back-logo.png" alt=""
                        class="wow animate__animated animate__fadeIn "></div>
                <div class="swiper-slide"><img src="homepageimages/back vidow.jpg" alt=""
                        class="wow animate__animated animate__fadeIn "></div>
            </div>
        </div>
    </section>


    <div class="section about" id="about">
        <h1 class="section-heading">ABOUT</h1>
        <hr class="hr">
        <div class="container">
            <div class="row my-auto">
                <div class="col-10 col-lg-4 mx-auto p-0 ">
                    <img src="homepageimages/madcraft.png" alt="" class="wow animate__animated animate__fadeIn">
                </div>
                <div class="col-10 col-lg-8 mx-auto p-4 text-center text-lg-left">
                    <h4 class="text-uppercase my-4" style="color: #8a1df0">Madcraft Multitasking Firm</h4>
                    <p class="text-white" style="line-height: 30px; font-size: 15px;">Lorem, ipsum dolor sit amet
                        consectetur adipisicing elit. Vitae doloribus quis quaerat hic velit corrupti facere accusamus
                        magni tempora quos tenetur, vero ducimus labore! Magnam nihil repellat perspiciatis nulla
                        distinctio saepe, molestiae iusto, asperiores, quibusdam dolore temporibus culpa officiis quasi?
                    </p>
                </div>
            </div>
        </div>
    </div>

    <section class="contact section" id="contact">
        <h1 class="section-heading">CONTACT US</h1>
        <hr class="hr">

        <form action="https://send.pageclip.co/CQJHqODIwtk0y4e8ET5zea5AeQDEqr7R/contact-form"
            class="needs-validation pageclip-form" method="post" novalidate>
            <div class="form-group  mb-5">
                <input type="text" class="form-control" id="name" placeholder="Enter full name" name="name" required>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group  mb-5">
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                <div class="invalid-feedback">Please enter correct email address.</div>
            </div>
            <div class="form-group mb-5">
                <textarea class="form-control" rows="5" id="message" placeholder="Enter message" name="message"
                    required></textarea>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary ">Submit</button>
            </div>
        </form>


        {{-- bootstrap form validation code --}}
        <script>
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Get the forms we want to add validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
    </section>

    <footer>
        <div class="social-icons">
            <a href="" class="fab fa-facebook-f"></a>
            <a href="" class="fab fa-whatsapp"></a>
            <a href="" class="fab fa-instagram"></a>
            <a href="" class="fab fa-linkedin-in"></a>
            <a href="" class="far fa-envelope"></a>
            <br> <br>
            <h6 class="text-white text-capitalize" style="line-height:30px">designed and built with <span
                    style="color: red;">&#10084;</span> by <br><a>tejas gaikwad</a> </h6>
        </div>
    </footer>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js'></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        new WOW().init();
        var swiper = new Swiper(".mySwiper", {
            watchSlidesProgress: true,
            watchSlidesVisibility: true,
            slidesPerView: 1,
            breakpoints: {
                500: {
                    slidesPerView: 2
                },
                1000: {
                    slidesPerView: 3
                }

            },
            loop: true,
            loopFillGroupWithBlank: true,
        });
    </script>
</body>

</html>
