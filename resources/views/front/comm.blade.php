<!DOCTYPE html>
<html lang="zh">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PetHospital</title>
  <link rel="stylesheet" href="/css/myall.css">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/slick-theme.css">
  <link rel="stylesheet" href="/css/slick.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/slick.css?v=1.01">
  <link rel="stylesheet" href="/css/sweetalert2.min.css">
  <script src="/js/sweetalert2.all.min.js"></script>
  <script src="/js/jquery.js"></script>

  <style type="text/css">
    @import url(http://fonts.googleapis.com/earlyaccess/cwtexhei.css);
  </style>
  <style>
    .navbar-default {
      -webkit-transition: all .3s cubic-bezier(0.42, 0, 0.58, 1);
      transition: all .3s cubic-bezier(0.42, 0, 0.58, 1);
      background-color: rgba(255, 255, 255, 0.9);
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
      padding: 0 2em;
      position: fixed;
      left: 0;
      z-index: 999;
      border-radius: 0;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: space-between;

    }

    .footer .footer_box ul li {
      /* -webkit-transition: all .3s cubic-bezier(0.42, 0, 0.58, 1);
    transition: all .3s cubic-bezier(0.42, 0, 0.58, 1); */
      display: inline-block;
      vertical-align: middle;
      border-radius: 100%;
      margin-left: .5em;
      position: relative;
      z-index: 1;
    }


    .footer_box2 {
      border-top: 1px solid #dcdcdc;
      width: 100%;
      text-align: center;
    }

    .footer_box3 ul li {
      display: inline-block;
      vertical-align: middle;
      margin: 0 .2em;
    }

    .footer .footer_box p {
      font-size: .92rem;
      color: #363433;
      line-height: 26px;
    }

    @media (max-width: 1280px) {
      .footer .top {
        right: 1em;
        top: 1em;
      }
    }
  </style>
</head>


<body>
  @if(Session::has("message"))
  <script>
    swal.fire("{{Session::get('message')}}");
  </script>
  @endif
  <nav class="navbar navbar-default sticky-lg-top navbar-expand-lg">

    <a class="navbar-brand" href="index"><img src="/images/LOGO/LOGO.png" alt="LOGO" class="img-fluid"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">專業分科</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            關於SUSU
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">環境介紹</a></li>
            <li><a class="dropdown-item" href="#">醫師介紹</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">最新消息</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">門診時間</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">聯絡我們</a>
        </li>

        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">會員系統</a>
        </li>
      </ul>
    </div>
  </nav>

  @yield("content")




  <footer class="footer mt-0">
    <div class="box" style="width: 1920px;height:2px color"></div>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-4 col-md-3 col-sm-12">
          <img src="/images/LOGO/LOGO.png" class="img-fluid" alt="神速動物醫院">
        </div>

        <div class="col-lg-4 col-md-9 col-sm-12">
          <div class="footer_box">
            <h3>客戶服務</h3>
            <p>本體系客戶服務時段為週一至週五10:00~12:00、14:00~17:00，不含例假日及國定假日，如需客戶服務請撥 0800-284-666，非服務時段請至「 <a href="http://www.vet.com.tw/contact.php">聯絡我們</a> 」頁面留言。</p>
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
              <li><a href="https://line.me/tw/" target="_blank" title="X"><img src="/images/footer/X.png" class="img-fluid" alt="X"></a></li>
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
  <script src="/js/jquery-3.7.1.min.js">
  </script>
  <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/js/sweetalert2@11.js"></script>



</body>

</html>