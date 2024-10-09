@extends("admin.app")
@section("title","修改會員分級")
@section("content")

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="../list" class="btn btn-secondary">回上頁</a>
                </div>
                <div class="card-body">
                    <!-- action目標位置網址  enctype="multipart/form-data上傳圖檔專用-->
                    <form method="post" action="../update">
                        <input type="hidden" name="id" value="{{ $prm->id }}">
                        {{ csrf_field() }}
                        <div class="row mt-3">
                            <div class="col-2 text-end">會員等級</div>
                            <div class="col-10">
                                <input type="number" class="form-control" name="prm" value="{{ $prm->prm }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 text-end">等級名稱</div>
                            <div class="col-10">
                                <input type="text" class="form-control" name="title" value="{{ $prm->title }}">
                            </div>
                        </div>
                        <div class="row mt-4">
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