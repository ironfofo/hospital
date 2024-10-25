@extends("admin.app")
@section("title","修改時間清單")
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
                        <input type="hidden" name="timeId" value="{{ $TimeList->timeId }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group row mt-3">
                            <label class="col-2 col-form-label text-end">時間名稱</label>
                            <div class="col-10">
                                <input type="text" class="form-control" name="timeperiod" value="{{ $TimeList->time_period }}">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label class="col-2 col-form-label text-end">開始時間</label>
                            <div class="col-10">
                                <input type="time" class="form-control" name="timestart" value="{{ $TimeList->time_start }}">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-2 col-form-label text-end">結束時間</label>
                            <div class="col-10">
                                <input type="time" class="form-control" name="timeend" value="{{ $TimeList->time_end }}">
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-12 d-flex justify-content-end">
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
