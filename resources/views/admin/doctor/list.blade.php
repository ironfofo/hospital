@extends("admin.app")
@section("title","醫師基本資料")
@section("content")
<link rel="stylesheet" href="/css/lightbox.min.css">
<script src="/js/lightbox.min.js"></script>
<script>
    lightbox.option({
      'resizeDuration':10 ,
      'wrapAround': true,
    })
</script>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-2">
                            <a class="btn btn-primary" href="add">新增</a>
                        </div>
                        <div class="col-2">
                            <a class="btn btn-danger" href="javascript:doDelete('list')">刪除</a>
                        </div>
                        <div class="col-2">
                            <a class="btn btn-success" href="export">匯出</a>
                        </div>
                    </div>
                    <form name="list" id="list" method="post" action="delete">
                        {{ csrf_field() }}
                        <table class="table mt-3">
                            <thead>
                                <tr class="table-warning">
                                    <td class="col-1 text-center">
                                        <input type="checkbox" name="all" id="all" class=" form-check-input">
                                    </td>
                                    <td class="text-center">姓名</td>
                                    <td class="text-center">編號</td>
                                    <td class="text-center">職位</td>
                                    <td class="text-center">學歷</td>
                                    <td class="text-center">科別</td>
                                    <td class="text-center">圖檔</td>
                                    <td class="text-center">修改</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list as $data)
                                <tr>
                                    <td class="text-center">
                                        <input type="checkbox" class="chk form-check-input border border-secondary" name="id[]" value="{{ $data->id }}">
                                    </td>
                                    <td class="text-center">{{ $data->doctorName }}</td>
                                    <td class="text-center">{{ $data->doctorId }}</td>
                                    <td class="text-center">{{ $data->position }}</td>
                                    <td class="text-center">{{ $data->edu }}</td>
                                    <td class="text-center">{{ $data->typeId }}</td>
                                    <td class="text-center">
                                        @if(!empty($data->photo))
                                            <a href="/images/doctor/{{ $data->photo }}" data-lightbox="photo">
                                                <img src="/images/doctor/{{ $data->photo }}" width="100">
                                            </a>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="edit/{{ $data->id }}" class="btn btn-success">修改</a>  
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
