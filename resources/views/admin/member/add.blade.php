<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>會員管理</title>
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
        <!--
            mt: marign
            mt4: 距離上邊界 ˋ4*space
        -->
        <div class="mt-5">
            <!--
                action:傳送到哪一個(哪一個持程式)
                method:主要get及post，另二個put及patch比較少見，put及patch主要用來更新資料
            -->
            <form action="../insert" method="POST">
                <!--
                    csrf_field: 表單加上token，代表由自己網站所發出訊息，不是由遠端發送
                    自動轉換為頁面<input type="hidden" name=_"token" value="xxxxxxx">
                    所有表單都要加上token，否則無法傳送
                -->
                {{csrf_field()}}

                <!--row:表示之下內容為同一格 bootstrap的CSS-->
                <div class="row">
                    <!--
                        col-2:一列有12格網路 col-2為2/12
                        text-center:置中
                    -->
                    <div class="col-2 text-center">姓名</div>
                    <div class="col-3">
                        <!--border border-dark:有黑色邊框-->
                        <input type="text" class="form-control border-dark" id="userName" name="userName" required autofocus onblur="doCheck(this.value)">
                        <span id="msg"></span>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-2 text-center">信箱</div>
                    <div class="col-2">
                        <input type="email" class="form-control border-dark" name="email" id="email" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-2 text-center">電話</div>
                    <div class="col-3">
                        <input type="text" class="form-control border-dark" name="phone" id="phone">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-2 text-center">地址</div>
                    <div class="col-3">
                        <input type="text" class="form-control border-dark" name="adr" id="adr">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-2 text-center">生日</div>
                    <div class="col-3">
                        <input type="date" class="form-control border-dark" name="bir" id="bir">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-2 text-center">帳號</div>
                    <div class="col-3">
                        <input type="text" class="form-control border-dark" name="userId" id="userId">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-2 text-center">密碼</div>
                    <div class="col-3">
                        <input type="text" class="form-control border-dark" name="pwd" id="pwd">
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button class="btn btn-primary btn-lg" type="submit">確 定</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>