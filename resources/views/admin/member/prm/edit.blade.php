@extends("admin.app")
@section("title","修改會員分級")
@section("content")

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded">
                <div class="card-header">
                    <a href="../list" class="btn btn-secondary">回上頁</a>
                </div>
                <div class="card-body">
                    <!-- enctype="multipart/form-data" 用於上傳圖檔時 -->
                    <form method="post" action="../update">
                        <input type="hidden" name="id" value="{{ $prm->id }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group row mt-3">
                            <label class="col-2 col-form-label text-end">會員等級</label>
                            <div class="col-9">
                                <input type="number" class="form-control" name="prm" value="{{ $prm->prm }}" placeholder="請輸入會員等級" required>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label class="col-2 col-form-label text-end">等級名稱</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="prmitle" value="{{ $prm->prmTitle }}" placeholder="請輸入等級名稱" required>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-12 text-end d-flex justify-content-end">
                                <button type="submit" class="btn02">儲存</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
