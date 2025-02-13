@extends("admin.app")
@section("title","會員修改")
@section("content")
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="../list" class="btn btn-secondary">回上頁</a>
                </div>
                <div class="card-body">
                    <form action="/admin/member/update" method="post">
                        <input type="hidden" name="id" value="{{$member->id}}">
                        {{csrf_field()}}

                        <div class="row mt-3 d-flex align-items-center">
                            <div class="col-2 text-end">姓名</div>
                            <div class="col-9">
                                <!--border border-dark:有黑色邊框-->
                                <input type="text" class="form-control" id="userName" name="userName" value="{{$member->userName}}" required autofocus onblur="doCheck(this.value)">
                                <span id="msg"></span>
                            </div>
                        </div>
                        <div class="row mt-3 d-flex align-items-center">
                            <div class="col-2 text-end">信箱</div>
                            <div class="col-9">
                                <input type="email" class="form-control" name="email" id="email" value="{{$member->email}}" required>
                            </div>
                        </div>
                        <div class="row mt-3 d-flex align-items-center">
                            <div class="col-2 text-end">電話</div>
                            <div class="col-9">
                                <input type="text" class="form-control" name="phone" id="phone" value="{{$member->phone}}">
                            </div>
                        </div>
                        <div class="row mt-3 d-flex align-items-center">
                            <div class="col-2 text-end">地址</div>
                            <div class="col-9">
                                <input type="text" class="form-control" name="adr" id="adr"  value="{{$member->adr}}">
                            </div>
                        </div>
                        <div class="row mt-3 d-flex align-items-center">
                            <div class="col-2 text-end">生日</div>
                            <div class="col-9">
                                <input type="date" class="form-control" name="bir" id="bir" value="{{$member->bir}}">
                            </div>
                        </div>
                        <div class="row mt-3 d-flex align-items-center">
                            <div class="col-2 text-end">帳號</div>
                            <div class="col-9">
                                <input type="text" class="form-control" name="userId" id="userId" value="{{$member->userId}}">
                            </div>
                        </div>
                        <div class="row mt-3 d-flex align-items-center">
                            <div class="col-2 text-end">密碼</div>
                            <div class="col-9">
                                <input type="text" class="form-control" name="pwd" id="pwd" value="{{$member->pwd}}">
                            </div>
                        </div> 
                        <div class="row mt-3 d-flex align-items-center">
                        <div class="col-2 text-end">會員等級</div>
                            <div class="col-9">
                            <select name="prm" id="prm" class="form-select">
                            @foreach($prm as $data)
                                <option value="{{$data->prm}}" {{ $data->prm == $member->prm ? "selected" : "" }}>{{$data->prmTitle}}</option>
                            @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-11 text-end d-flex justify-content-end">
                                <button type="submit" class="btn02"><i class="fa-sharp-duotone fa-solid fa-file-arrow-up"></i>儲 存</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection