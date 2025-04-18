<!DOCTYPE html>
<html lang="zh">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> PetHospital</title>
  <link rel="icon" href="/images/LOGO/pethospitalIcon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/css/myall.css">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/slick-theme.css">
  <link rel="stylesheet" href="/css/all.min.css">
  <link rel="stylesheet" href="/css/slick.css">
  <link rel="stylesheet" href="/css/slick.css?v=1.01">
  <link rel="stylesheet" href="/css/sweetalert2.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
  


  <style type="text/css">
  .nav-link {
    color:#7a4800 ;
    font-weight: 100;

  }
  .nav-link:hover {
    color: #FF9800; /* 懸停時變為柔和的橙色 */ 

  }

    @import url(http://fonts.googleapis.com/earlyaccess/cwtexhei.css);

    
  </style>

</head>


<body>
  @if(session()->has("message"))
  <script>
    swal.fire("{{Session::get('message')}}");
  </script>
  @endif
  <section id="s01">
    <nav class="navbar navbar-default sticky-lg-top navbar-expand-lg">
      <a class="navbar-brand" href="/"><img src="/images/LOGO/LOGOB.png" alt="LOGO" class="ms-3"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse me-3" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <!-- <li class="nav-item">
            <a class="nav-link" href="/about/list">關於SUSU</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/environment/list">環境介紹</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="/doctor/list">醫師介紹</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/schedule/list">門診時間</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contact/list">聯絡我們</a>
          </li>

          @if(Session()->has("userId"))
          <li class="nav-item">
            
          </li>
          @endif
        </ul>
        
        <div class="ms-1">
          @if(Session()->has("userId"))
          <div class="d-flex align-items-center ms-2">
          <a class="nav-link" href="#">
            <i class="fa-solid fa-user text-03 "></i>
            <span class="text-03 fw-900" id="login_username02">{{session()->get("userId")}}</span>
            <span class="text-03 fw-900" >會員系統</span>
          </a>
          <button class="btn01 ms-2" type="button" onclick="logOut()"><i class="fa-solid fa-right-from-bracket"></i>登出</button>
          </div>
          @else
          <div class="d-flex">
          <a href="/member/login" class="btn01 P-3"><i class="fa-solid fa-right-to-bracket"></i>登入</a>
          <a href="/member/register" class="btn01 P-3"><i class="fa-solid fa-registered"></i>註冊</a>
          </div>
          @endif
        </div>
      </div>
    </nav>
  </section>

  @yield("content")

  <footer class="footer mt-5">
    <div class="box" style="width: 1920px;height:2px color"></div>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-4 col-md-3 col-sm-12">
          <img src="/images/LOGO/LOGOS.png" class="img-fluid" alt="神速動物醫院">
        </div>

        <div class="col-lg-4 col-md-9 col-sm-12">
          <div class="footer_box">
            <h3>客戶服務</h3>
            <p>本體系客戶服務時段為週一至週五10:00~12:00、14:00~17:00，不含例假日及國定假日，如需客戶服務請撥 0800-284-666，非服務時段請至「 <a href="/contact/list" style="text-decoration: none">聯絡我們</a> 」頁面留言。</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-5 col-sm-6 col-12">
          <div class="footer_box">
            <ul>
              <li><a href="https://www.facebook.com/" target="_blank" title="facebook"><img src="/images/footer/facebook.png" class="img-fluid" alt="facebook"></a></li>
              <li>
                <a href="https://www.instagram.com/" target="_blank" title="instagram">
                  <img src="/images/footer/insgram.png" class="img-fluid" alt="instagram">
                </a>
              </li>
              <li><a href="https://x.com/i/flow/login?lang=en" target="_blank" title="X"><img src="/images/footer/X.png" class="img-fluid" alt="X"></a></li>
              <li>
                <a href="https://open.firstory.me/user/cl0rv6tyk006g0hzl2u3xdnrn/platforms?fbclid=IwAR3dpMeqkDWIwFJuCVFhrg3cSGnXtXQfCsvOzIQYWEsn5oZx4sD7bxZ18jM" target="_blank" rel="noopener" title="podcast">
                </a>
              </li>
            </ul>
          </div>
        </div>

      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="footer_box2">
          <p>@20204 ironfofo </a></p>
        </div>
      </div>
    </div>
  </footer>
  <script src="/js/jquery-3.7.1.min.js"></script>
  <script src="/js/jquery-ui.min.js"></script>
  <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/counterup2@2.0.2/dist/index.js"></script>
  <script src="/js/wow.min.js"></script>
  <script src="/js/sweetalert2@11.js"></script>

  <script>
    function logOut() {
      Swal.fire({
        title: "確定登出嗎?",
        text: "",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "確定登出",
        cancelButtonText: "不登出",
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "/member/logOut",
            type: "post",
            data: {
              _token: "{{csrf_token()}}"
            },
            success: function() {
              Swal.fire("已登出").then(() => {
                location.reload(); // 刷新頁面
              });
            },

          });
        }
      });
    }
  </script>

  

</body>

</html>