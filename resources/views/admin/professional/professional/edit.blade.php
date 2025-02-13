@extends("admin.app")
@section("title","修改專業分科資料")
@section("content")

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="../list" class="btn btn-secondary">回上頁</a>
                </div>
                <div class="card-body">
                    <form method="post" action="../update" enctype="multipart/form-data">
                        <input type="hidden" name="typeId" value="{{ $pro->typeId }}">
                        {{ csrf_field() }}
                        <div class="row mt-3">
                            <div class="col-2 text-end">科別</div>
                            <div class="col-10">
                                <input type="text" class="form-control" name="department" value="{{ $pro->department }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 text-end">英文</div>
                            <div class="col-10">
                                <input type="text" class="form-control" name="lan" value="{{ $pro->lan }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-2 text-end">圖檔</label>
                            <div class="col-4">
                                <input type="file" class="form-control" name="photo">
                                @if(!empty($pro->photo))
                                    <img src="/images/professional/{{ $pro->photo }}" class="" id="prevImg" width="100">
                                @endif
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 text-end d-flex justify-content-end">
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