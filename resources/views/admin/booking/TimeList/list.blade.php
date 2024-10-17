@extends("admin.app")
@section("title","時間清單")
@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-auto">
                            <a class="btn btn-primary" href="add">新增</a>
                        </div>
                        <div class="col-auto">
                            <a class="btn btn-danger" href="javascript:doDelete('list')">刪除</a>
                        </div>
                    </div>
                    <form name="list" id="list" method="post" action="delete">
                        {{ csrf_field() }}
                        <table class="table table-hover mt-3">
                            <thead>
                                <tr class="table-warning">
                                    <th class="text-center" >
                                        <input type="checkbox" name="all" id="all" class="form-check-input" style="margin-top: -20px;">
                                    </th>
                                    <th class="text-center">時間名稱</td>
                                    <th class="text-center">開始時間</td>
                                    <th class="text-center">結束時間</td>
                                    <th class="text-center">修改</td>
                            </thead>
                            <tbody>
                                @foreach($list as $data)
                                <tr>
                                    <td class="text-center">
                                        <input type="checkbox" class="chk form-check-input border border-secondary" name="timeId[]" value="{{ $data->timeId }}">
                                    </td>
                                    <td class="text-center">{{ $data-> time_period}}</td>
                                    <td class="text-center">{{ $data->time_start }}</td>
                                    <td class="text-center">{{ $data->time_end }}</td>
                                    <td class="text-center">
                                        <a href="edit/{{ $data->timeId }}" class="btn btn-success">修改</a>  
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
