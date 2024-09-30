@extends("admin.app")
@section("title","新增醫師基本資料")
@section("content")
<link rel="stylesheet" href="/css/admin/ckeditor.css">

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="list" class="btn btn-secondary">回上頁</a>
                </div>
                <div class="card-body">
                    <!-- action目標位置網址  enctype="multipart/form-data上傳圖檔專用-->
                    <form method="post" action="insert" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row mt-3">
                            <div class="col-2 text-end">姓名</div>
                            <div class="col-10">
                                <input type="text" class="form-control" name="doctorName" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 text-end">編號</div>
                            <div class="col-10">
                                <input type="text" class="form-control" name="doctorId" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 text-end">職位</div>
                            <div class="col-10">
                                <input type="text" class="form-control" name="position" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 text-end">學歷</div>
                            <div class="col-10">
                                <input type="text" class="form-control" name="edu" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 text-end">科別</div>
                            <div class="col-10">
                                <input type="text" class="form-control" name="typeId" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 text-end">內容</div>
                            <div class="col-10">
                                <textarea class="form-control editor" name="content" id="editor"></textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 text-end">圖檔</div>
                            <div class="col-4">
                                <input type="file" class="form-control" name="photo" required>
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
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/super-build/ckeditor.js"></script>
<script src="/js/admin/editor.js"></script>
@endsection