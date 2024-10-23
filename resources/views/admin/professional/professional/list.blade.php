@extends("admin.app")
@section("title","專業分科資料")
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
                        <div class="col-auto">
                            <a class="btnC" href="add">新增</a>
                        </div>
                        <div class="col-auto">
                            <a class="btnD" href="javascript:doDelete('list')">刪除</a>
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
                                    <td class="text-center">科別</td>
                                    <td class="text-center">英文</td>
                                    <td class="text-center">修改</td>
                            </thead>
                            <tbody>
                                @foreach($list as $data)
                                <tr>
                                    <td class="text-center">
                                        <input type="checkbox" class="chk form-check-input border border-secondary" name="typeId[]" value="{{ $data->typeId }}">
                                    </td>
                                    <td class="text-center">{{ $data->department }}</td>
                                    <td class="text-center">{{ $data->lan }}</td>
                                    <td class="text-center d-flex justify-content-center">
                                        <a href="edit/{{ $data->typeId }}" class="btnU">修改</a>  
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
