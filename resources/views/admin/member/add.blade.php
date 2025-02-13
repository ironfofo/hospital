@extends("admin.app")
@section("title","新增會員")
@section("content")
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


    <div class="container mb-5">
            <div class="card mt-1">
            <div class="card-header">
                <a href="list" class="btn btn-secondary">回上頁</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <form action="../member/insert" method="POST">
                        {{csrf_field()}}
                        <div class="row mt-3">
                            <label class="col-2 text-end">姓名</label>
                            <div class="col-9">
                                <!-- old:意思是原始資料 -->
                                <input type="text" name="userName" id="userName" class="form-control is-invalid" required value="{{old('pwd')}}">
                                <div class="valid-feedback">ok</div>
                                <div class="invalid-feedback">填寫姓名</div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-2 text-end">信箱</label>
                            <div class="col-9">
                                <input type="email" name="email" id="email" class="form-control is-invalid" required value="{{old('email')}}">
                                <div class="valid-feedback">ok</div>
                                <div class="invalid-feedback">填寫信箱</div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-2 text-end">電話</label>
                            <div class="col-9">
                                <input type="text" name="phone" id="phone" class="form-control is-invalid" required value="{{old('phone')}}">
                                <div class="valid-feedback">ok</div>
                                <div class="invalid-feedback">請寫電話</div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-2 text-end">地址</label>
                            <div class="col-9">
                                <input type="text" name="adr" id="adr" class="form-control is-invalid" minlength="15" required value="{{old('adr')}}">
                                <div class="valid-feedback">ok</div>
                                <div class="invalid-feedback">填寫地址</div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-2 text-end">生日</label>
                            <div class="col-9">
                                <input type="date" name="bir" id="bir" class="form-control is-invalid" required value="{{old('bir')}}">
                                <div class="valid-feedback">ok</div>
                                <div class="invalid-feedback">填寫生日</div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-2 text-end">帳號</label>
                            <div class="col-9">
                                <input type="text" name="userId" id="userId" class="form-control is-invalid" placeholder="字數4~15" required value="{{old('userId')}}" onblur="doCheck(this.value)">
                                <span id="msg"></span>
                                <div class="valid-feedback">ok</div>
                                <div class="invalid-feedback">填寫帳號</div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-2 text-end">密碼</label>
                            <div class="col-9">
                                <!-- old:意思是原始資料 -->
                                <input type="password" name="pwd1" id="pwd1" class="form-control is-invalid" placeholder="字數3~15" required value="{{old('pwd')}}">
                                <div class="valid-feedback">ok</div>
                                <div class="invalid-feedback">填寫密碼</div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-2 text-end">確認密碼</label>
                            <div class="col-9">
                                <input type="password" name="pwd2" id="pwd2" class="form-control is-invalid" placeholder="字數3~15">
                                <span id="checkpwd"></span>
                                <div class="valid-feedback">OK</div>
                                <div class="invalid-feedback">密碼需相同</div>
                            </div>
                        </div>
                        <div class="col-11   d-flex justify-content-end mt-3 mb-3">
                            <button class="btn02" type="submit"><i class="fa-sharp-duotone fa-solid fa-file-arrow-up"></i>儲 存</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script>
        var f_userName = false;
        var f_email = false;
        var f_phone = false;
        var f_adr = false;
        var f_bir = false;
        var f_userId = false;
        var f_pwd1 = false;
        var f_pwd2 = false;
        $(function() {

            // 初始禁用提交按鈕
            $('button[type="submit"]').prop('disabled', true)

            $("#userName").bind("input propertychange", function() {
                if ($(this).val() != "") {
                    //符合規定
                    $(this).removeClass("is-invalid");
                    $(this).addClass("is-valid");
                    f_userName = true;

                } else {
                    //不符合規定
                    $(this).removeClass("is-valid");
                    $(this).addClass("is-invalid");
                    f_userName = false;
                }
            });
            $("#email").bind("input propertychange", function() {
                if ($(this).val().includes('@')) {
                    //符合規定
                    $(this).removeClass("is-invalid");
                    $(this).addClass("is-valid");
                    f_email = true;

                } else {
                    //不符合規定
                    $(this).removeClass("is-valid");
                    $(this).addClass("is-invalid");
                    f_email = false;
                }
            });
            $("#phone").bind("input propertychange", function() {
                if ($(this).val() > 8) {
                    //符合規定
                    $(this).removeClass("is-invalid");
                    $(this).addClass("is-valid");
                    f_phone = true;

                } else {
                    //不符合規定
                    $(this).removeClass("is-valid");
                    $(this).addClass("is-invalid");
                    f_phone = false;
                }
            });
            $("#adr").bind("input propertychange", function() {
                if ($(this).val().length > 15) {
                    //符合規定
                    $(this).removeClass("is-invalid");
                    $(this).addClass("is-valid");
                    f_adr = true;

                } else {
                    //不符合規定
                    $(this).removeClass("is-valid");
                    $(this).addClass("is-invalid");
                    f_adr = false;
                }
            });
            $("#bir").bind("input propertychange", function() {
                if ($(this).val() != "") {
                    //符合規定
                    $(this).removeClass("is-invalid");
                    $(this).addClass("is-valid");
                    f_bir = true;

                } else {
                    //不符合規定
                    $(this).removeClass("is-valid");
                    $(this).addClass("is-invalid");
                    f_bir = false;
                }
            });
            $("#userId").bind("input propertychange", function() {
                if ($(this).val().length > 3 && $(this).val().length < 16) {
                    //符合規定
                    $(this).removeClass("is-invalid");
                    $(this).addClass("is-valid");
                    f_userId = true;

                } else {
                    //不符合規定
                    $(this).removeClass("is-valid");
                    $(this).addClass("is-invalid");
                    f_userId = false;
                }
            });
            $("#pwd1").bind("input propertychange", function() {
                if ($(this).val().length > 3 && $(this).val().length < 16) {
                    //符合規定
                    $(this).removeClass("is-invalid");
                    $(this).addClass("is-valid");
                    f_pwd1 = true;

                } else {
                    //不符合規定
                    $(this).removeClass("is-valid");
                    $(this).addClass("is-invalid");
                    f_pwd1 = false;
                }
            });
            $("#pwd2").bind("input propertychange", function() {
                if ($(this).val() == $("#pwd1").val()) {
                    //符合規定
                    $(this).removeClass("is-invalid");
                    $(this).addClass("is-valid");
                    f_pwd2 = true;

                } else {
                    //不符合規定
                    //密碼如何相同時才送出
                    $(this).removeClass("is-valid");
                    $(this).addClass("is-invalid");
                    f_pwd2 = false;

                }
            });

        })

        function validateForm() {
            var isValid = f_userName && f_email && f_phone && f_adr && f_bir && f_userId && f_pwd1 && f_pwd2;
            $('button[type="submit"]').prop('disabled', !isValid);
        }

        $(function() {
            validateForm();

            $("#userName, #email, #phone, #adr, #bir, #userId, #pwd1, #pwd2").on("input propertychange", function() {
                validateForm();
            });
        });
    </script>
@endsection