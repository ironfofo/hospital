<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>會員管理</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

</head>

<body>
    <div class="container">
        <!--
            mt: marign
            mt4: 距離上邊界 ˋ4*space
        -->
        <div class="mt-5">

            <form action="/admin/member/update" method="post">
                <input type="hidden" name="id" value="{{$member->id}}">
                {{csrf_field()}}

                <div class="row">
                    <!--
                        col-2:一列有12格網路 col-2為2/12
                        text-center:置中
                    -->
                    <div class="col-2 text-center">姓名</div>
                    <div class="col-2">
                        <!--border border-dark:有黑色邊框-->
                        <input type="text" class="form-control border-dark" id="userName" name="userName" value="{{$member->userName}}" required autofocus onblur="doCheck(this.value)">
                        <span id="msg"></span>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-2 text-center">信箱</div>
                    <div class="col-2">
                        <input type="email" class="form-control border-dark" name="email" id="email" value="{{$member->email}}" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-2 text-center">電話</div>
                    <div class="col-2">
                        <input type="text" class="form-control border-dark" name="phone" id="phone" value="{{$member->phone}}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-2 text-center">地址</div>
                    <div class="col-2">
                        <input type="text" class="form-control border-dark" name="adr" id="adr"  value="{{$member->adr}}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-2 text-center">生日</div>
                    <div class="col-2">
                        <input type="date" class="form-control border-dark" name="bir" id="bir" value="{{$member->bir}}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-2 text-center">帳號</div>
                    <div class="col-2">
                        <input type="text" class="form-control border-dark" name="userId" id="userId" value="{{$member->userId}}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-2 text-center">密碼</div>
                    <div class="col-2">
                        <input type="text" class="form-control border-dark" name="pwd" id="pwd" value="{{$member->pwd}}">
                    </div>
                </div> 

                <div class="col-12 test-center">
                    <button class="btn btn-primary btn-lg" type="submit">確 定</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>