@extends("admin.app")
@section("title","修改專業分科細項")
@section("content")


<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="../list" class="btn btn-secondary">回上頁</a>
                </div>
                <div class="card-body">
                    <form method="post" action="../update">
                        <input type="hidden" name="id" value="{{$professional_layer1->id}}">
                        {{ csrf_field() }}
                        <div class="row mt-3">
                            <label class="col-2 text-end">科別</label>
                            <div class="col-10">
                                <select name="typeId" id="typeId" class="form-select">
                                    @foreach($professional as $pro)
                                    <option value="{{ $pro->typeId }}"{{$pro->typeId==$professional_layer1->typeId ? "selected": ""}}>{{ $pro->department }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-2 text-end">細項</label>
                            <div class="col-10">
                                <input type="text" class="form-control" name="layer1_name" value="{{ $professional_layer1->layer1_name }}">
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