@extends("front.comm")
@section("content")

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">


<div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
            aria-label="Slide 4"></button>

    </div>
    <div class="carousel-inner">
        <div class="carousel-item bg-cover active" style="background-image: url(/images/banner/Veterinarian-03.jpg.webp);height: 60vh;">
            <div class="carousel-caption d-none d-md-block mb-5 wow animate__flipInX"
                data-wow-duration="5s" data-wow-delay="0s" data-wow-iteration="1">
                <h5>定期健康檢查</h5>
                <p>提供全面的健康檢查服務，早期發現潛在健康問題，專業獸醫團隊，細心呵護</p>
            </div>
        </div>
        <div class="carousel-item bg-cover" style="background-image: url(images/banner/NVA-City-Dog-Cat-Sleeping-Grass.webp);height: 60vh;">
            <div class="carousel-caption d-none d-md-block mb-5 wow animate__flipInX"
                data-wow-duration="5s" data-wow-delay="0s" data-wow-iteration="1">
                <h5>疫苗接種</h5>
                <p>提供各類疫苗接種服務,預防常見疾病，增強免疫力安全有效，讓您安心</p>
            </div>
        </div>
        <div class="carousel-item bg-cover" style="background-image: url(images/banner/check.png);height: 60vh;">
            <div class="carousel-caption d-none d-md-block mb-5 wow animate__flipInX"
                data-wow-duration="5s" data-wow-delay="0s" data-wow-iteration="1">
                <h5>專業資格</h5>
                <p>我們的獸醫團隊均畢業於知名獸醫學院，並持有國際認可的專業資格證書</p>
            </div>
        </div>
        <div class="carousel-item bg-cover" style="background-image: url(images/banner/ricky-kharawala-adK3Vu70DEQ-unsplash.jpg);height: 60vh;">
            <div class="carousel-caption d-none d-md-block mb-5 wow animate__flipInX"
                data-wow-duration="5s" data-wow-delay="0s" data-wow-iteration="1">
                <h5>緊急醫療</h5>
                <p>24小時緊急醫療服務，快速反應，專業處理，全面設備，保障健康</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="bg-01">
    <div class="container pt-4 pt-3 ">
        <div class="row">
            <div class="col-md-4 text-center mt-4 mb-3">
                <i class="fa-brands fa-pagelines fa-6x text-success mb-3"></i>
                <h5 class="fw-900 mb-3">專業資格</h5>
                <p class="fs-5">
                    我們的獸醫團隊均畢業於知名獸醫學院，並持有國際認可的專業資格證書
                </p>
            </div>
            <div class="col-md-4 text-center mt-4 mb-3">
                <i class="fa-solid fa-battery-three-quarters fa-6x text-success mb-3"></i>
                <h5 class="fw-900 mb-3">臨床經驗</h5>
                <p class="fs-5">
                    每位獸醫都擁有多年臨床經驗，處理過各類複雜的寵物健康問題
                </p>
            </div>
            <div class="col-md-4 text-center mt-4 mb-3">
                <i class="fa-solid fa-tree-city fa-6x text-success mb-3"></i>
                <h5 class="fw-900 mb-3">持續學習</h5>
                <p class="fs-5">
                    我們的團隊不斷參加國內外的專業培訓和研討會，確保掌握最新的醫療技術和知識
                </p>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row align-items-center">
        <div class="col-md-4 bg-cover wow animate__fadeInLeftBig" data-wow-duration="3s" data-wow-delay="0s"
            data-wow-iteration="1"
            style="background-image: url(images/banner/dog.jpg);height: 70vh; background-attachment: local;">
        </div>
        <div class="col-md-8 p-5  wow animate__fadeInRight" data-wow-duration="5s" data-wow-delay="0s"
            data-wow-iteration="1">
            <h1>專業團隊<span class="text-success">受過嚴格訓練</span></h1>
            <h1>寵物醫院首選</h1>

            <div class="row">
                <div class="col-2">
                    <h4>每年臨床手術</h4>
                    <h2 class="counter01">1000<span class="h4">/位</span></h2>
                </div>
                <div class="col-2">
                    <h4>專業證照</h4>
                    <h2 class="counter02">100<span class="h4">/項</span></h2>
                </div>
                <div class="col-2">
                    <h4>大型寵物間</h4>
                    <h2 class="counter03">5 <span class="h4">/間</span></h2>
                </div>
                <div class="col-2">
                    <h4>中型寵物間</h4>
                    <h2 class="counter04">20 <span class="h4">/間</span></h2>
                </div>
                <div class="col-2">
                    <h4>小型寵物間</h4>
                    <h2 class="counter05">20 <span class="h4">/間</span></h2>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.7.1.min.js"></script>
<script src="https://unpkg.com/counterup2@2.0.2/dist/index.js"></script>
<Script>
    $(function() {

        //wow 顯示動畫
        new WOW().init();

        //counter up s04碼表數字
        const counterUp = window.counterUp.default
        const callback = entries => {
            entries.forEach(entry => {
                const el = entry.target
                if (entry.isIntersecting && !el.classList.contains('is-visible')) {
                    counterUp(el, {
                        duration: 2000,
                        delay: 16,
                    })
                    el.classList.add('is-visible')
                }
            })
        }
        const IO = new IntersectionObserver(callback, {
            threshold: 1
        })

        //querySelector選取要使用ID名稱，放進IO.observe()裡
        const el01 = document.querySelector('.counter01')
        IO.observe(el01)
        const el02 = document.querySelector('.counter02')
        IO.observe(el02)
        const el03 = document.querySelector('.counter03')
        IO.observe(el03)
        const el04 = document.querySelector('.counter04')
        IO.observe(el04)
    })
</Script>

@endsection