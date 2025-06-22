@extends("front.comm")
@section("content")
<div class="container">
    <div class="row mt-5">
        <div class="card">
            <form action="/member/doLogin" method="post" id="loginForm">
                {{csrf_field()}}
                <div class="row mt-3">
                    <div class="col-2 text-center">帳號</div>
                    <div class="col-4">
                        <input type="text" name="userId" class="form-control" required value="{{old('userId')}}">
                    </div>
                </div>
                @if ($errors->has("msg"))
                <div class="row">
                    <div class="col-8 text-danger text-center">{{$errors->first("msg")}}</div>
                </div>
                @endif
                <div class="row mt-3">
                    <div class="col-2 text-center">密碼</div>
                    <div class="col-4">
                        <!-- old:意思是原始資料 -->
                        <input type="password" name="pwd" class="form-control" required value="{{old('pwd')}}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-2 text-center">認證碼</div>
                    <div class="col-4">
                        <input type="text" name="code" class="form-control" required>
                    </div>
                    <div class="col-4">
                        <img src="/captcha/flat?" onclick="this.src='/captcha/flat?' + Math.random()" style="cursor:pointer">
                    </div>
                </div>
                @if($errors->has("code"))
                <div class="row">
                    <div class="col-8 text-danger text-center">{{$errors->first("code")}}</div>
                </div>
                @endif
                <div class="row mt-3 text-end mb-3 ms-5">
                    <div class="col-4">
                        <button type="submit" class="btn02 btn-lg "><i class="fa-solid fa-right-to-bracket"></i>登入</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection