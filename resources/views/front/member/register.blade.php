@extends("front.comm")
@section("content")

<script src="/js/jquery.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script>
    function doCheck(userId) {
        //this.value:此欄位值
        //$("#xxx").val():jquery依id取值
        //var id=$("#userId").val();
        //jquery用法依id取值
        //var uId=document.getElementById("userId").val();

        if (userId != "") {
            $.ajax({
                url: "/member/checkUser",
                type: "post",
                data: {
                    userId: userId,
                    _token: "{{csrf_token()}}",

                },

                success: function(msg) {
                    if (msg == "exist") {
                        $("#userId").focus();
                        $("#msg").html("<font color='red'>此帳號已經有人使用</font>")
                    } else {
                        $("#msg").html("");
                    }
                }
            });
        }
    }
</script>

</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="card mt-5">
                <form action="/member/doRegister" method="post">
                    {{csrf_field()}}
                    <div class="row mt-3">
                        <div class="col-2 text-center">姓名</div>
                        <div class="col-4">
                            <!-- old:意思是原始資料 -->
                            <input type="text" name="userName" class="form-control is-invalid" required value="{{old('pwd')}}">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">填寫姓名</div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2 text-center">信箱</div>
                        <div class="col-4">
                            <input type="email" name="email" class="form-control is-invalid" required value="{{old('email')}}">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">填寫信箱</div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2 text-center">地址</div>
                        <div class="col-4">
                            <input type="text" name="adr" class="form-control is-invalid" required value="{{old('adr')}}">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">填寫底址</div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2 text-center">電話</div>
                        <div class="col-4">
                            <input type="phone" name="phone" class="form-control is-invalid" required value="{{old('phone')}}">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">請寫電話</div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2 text-center">生日</div>
                        <div class="col-4">
                            <input type="date" name="bir" class="form-control is-invalid" required value="{{old('bir')}}">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">填寫生日</div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2 text-center">帳號</div>
                        <div class="col-4">
                            <input type="text" name="userId" class="form-control is-invalid" minlength="8" maxlength="15" placeholder="字數8~15" required value="{{old('userId')}}" onblur="doCheck(this.value)">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8 text-danger text-center"></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-2 text-center">密碼</div>
                        <div class="col-4">
                            <!-- old:意思是原始資料 -->
                            <input type="password" name="pwd1" id="pwd1" class="form-control is-invalid" minlength="8" maxlength="15" placeholder="字數8~15" required value="{{old('pwd')}}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2 text-center">確認密碼</div>
                        <div class="col-4">
                            <input type="password" name="pwd2" id="pwd2" class="form-control is-invalid">
                            <div class="valid-feedback">OK</div>
                            <div class="invalid-feedback">密碼需相同</div>
                        </div>
                    </div>


                    <div class="row mt-3 text-end mb-3 justify-content-center">
                        <div class="col-2 col-sm-1">
                            <button type="submit" class="btn01">確認</button>
                        </div>
                        <div class="col-2 col-sm-1">
                            <a href="index.php" style="text-decoration: none;">
                                <button type="submit" class="btn01 btn-primary btn-lg">取消</button>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
        var f_pwd = false;
        $(function() {
            $("#pwd2").bind("input propertychange", function() {
                if ($(this).val() == $("#pwd1").val()) {
                    //符合規定
                    $(this).removeClass("is-invalid");
                    $(this).addClass("is-valid");
                    f_pwd = true;

                } else {
                    //不符合規定
                    $(this).removeClass("is-valid");
                    $(this).addClass("is-invalid");
                    f_pwd = false;
                }
            });
        })
    </script>
</body>

@endsection