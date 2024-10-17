@extends("admin.app")
@section("title","修改醫師休假表")
@section("content")
<link rel="stylesheet" href="/css/admin/ckeditor.css">


<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="../list" class="btn btn-secondary">回上頁</a>
                </div>
                <div class="card-body">
                    <!-- action目標位置網址  enctype="multipart/form-data上傳圖檔專用-->
                    <form method="post" action="../update" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{ $doctor->id }}">
                        {{ csrf_field() }}



                        <div class="row mt-3">
                            <label class="col-2 text-end">醫師編號</label>
                            <div class="col-10">
                                <select name="department" id="typeId" class="form-select">
                                        @foreach($doctorrest as $data)
                                            <option value="{{$data->doctorId}}"{{$data->typeId==$doctor->typeId ? "selected": ""}}>{{$data->department}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-2 text-end">內容</label>
                            <div class="col-10">
                                <textarea class="form-control editor" name="content" id="editor">{!! $doctor->content !!}</textarea>
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

<script>
    $("#file").change(function () {
        if (file.files[0].type == "image/png" || file.files[0].type == "image/jpeg") {
            $("#prevImg").removeClass("d-none");
            $("#prevImg").attr("src", URL.createObjectURL(file.files[0]));
                photo = file01.files[0];
            } else {
                alert("jpg or png");
            }
    });
</script>
@endsection