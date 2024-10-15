@extends("admin.app")
@section("title","新增會員分級")
@section("content")


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="list" class="btn btn-secondary">回上頁</a>
                </div>
                <div class="card-body">
                    <form method="post" action="insert">
                        {{ csrf_field() }}
                        <div class="form-group row mt-3">
                            <label class="col-2 text-end">會員等級</label>
                            <div class="col-10">
                                <input type="number" class="form-control" name="prm" placeholder="請輸入會員等級">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-2 text-end">等級名稱</label>
                            <div class="col-10">
                                <input type="text" class="form-control" name="prmTitle" placeholder="請輸入等級名稱">
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-primary btn-lg">儲存</button>
                            </div>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
