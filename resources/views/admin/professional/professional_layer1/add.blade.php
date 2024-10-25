@extends("admin.app")
@section("title","新增專業分科細項")
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
                            <label class="col-2 text-end">科別</label>
                            <div class="col-10">
                                <select name="typeId" id="typeId" class="form-select">
                                    <option value="">請選擇科別</option>
                                    @foreach($professional as $pro)
                                    <option value="{{ $pro->typeId }}">{{ $pro->department }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-2 text-end">細項</label>
                            <div class="col-10">
                                <input type="text" class="form-control" name="layer1_name" placeholder="請輸入細項">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 text-end d-flex justify-content-end">
                                <button type="submit" class="btn02"><i class="fa-sharp-duotone fa-solid fa-file-arrow-up"></i>儲存</button>
                            </div>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection