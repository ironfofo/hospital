@extends("admin.app")
@section("title","會員分級")
@section("content")
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
                    </div>
                    <form name="list" id="list" method="post" action="delete">
                        {{ csrf_field() }}
                        <table class="table mt-3">
                            <thead>
                                <tr class="table-warning">
                                    <td class="col-1 text-center">
                                        <input type="checkbox" name="all" id="all" class=" form-check-input">
                                    </td>
                                    <td class="text-center">會員等級</td>
                                    <td class="text-center">等級名稱</td>
                                    <td class="text-center">修改</td>
                            </thead>
                            <tbody>
                                @foreach($list as $data)
                                <tr>
                                    <td class="text-center">
                                        <input type="checkbox" class="chk form-check-input border border-secondary" name="id[]" value="{{ $data->id }}">
                                    </td>
                                    <td class="text-center">{{ $data->prm }}</td>
                                    <td class="text-center">{{ $data->title }}</td>
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