@extends("admin.app")
@section("title","新增專業分科資料")
@section("content")


<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="list" class="btn btn-secondary">回上頁</a>
                </div>
                <div class="card-body">
                    <form method="post" action="insert">
                        {{ csrf_field() }}
                        <div class="row mt-3">
                            <div class="col-2 text-end">科別</div>
                            <div class="col-10">
                                <input type="text" class="form-control" name="department">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 text-end">英文</div>
                            <div class="col-10">
                                <input type="text" class="form-control" name="lan">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 text-end d-flex justify-content-end">
                                <button type="submit" class="btn02">儲 存</button>
                            </div>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection