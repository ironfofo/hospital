<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css" rel="stylesheet">
    <title>會員管理</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        function doDelete(id, userName) {
            Swal.fire({
                title: "確定刪除[" + userName + "]?",
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: "確定",
                denyButtonText: "不刪除"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "請再次確認[" + userName + "]?",
                        showDenyButton: true,
                        showCancelButton: false,
                        confirmButtonText: "確定要刪除",
                        denyButtonText: "不刪除"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "/member/delete/",
                                type: "post",
                                //dataType:"json",資料傳回方法一種這裡不是這種
                                data: {
                                    id: id,
                                    _token: "{{ csrf_token() }}"
                                },
                                //msg:變數名稱，不一定是msg這個字，可自己定
                                success: function(msg) {
                                    if (msg == "ok") {
                                        Swal.fire("已刪除");
                                        $("table tr.user" + id).remove();
                                    }
                                }
                            });
                        }
                    });
                }
            });
        }
    </script>
</head>

<body>
    <!--如果有有message就顯示出來-->
    @if(Session::has("message"))
    <script>
        Swal.fire("{{Session::get('message')}}")
    </script>
    @endif
    <div class="container">
        <div class="col-12 mt-4 mb-3">
            <a class="btn btn-primary" href="add">新增</a>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-rwd">
                            <thead>
                                <tr>
                                    <th class="text-center">預約編號</th>
                                    <th class="text-center">會員帳號</th>
                                    <th class="text-center">會員姓名</th>
                                    <th class="text-center">醫生</th>
                                    <th class="text-center">日期</th>
                                    <th class="text-center">時間</th>
                                    <th class="text-center">-</th>

                                </tr>
                            </thead>
                            @foreach($list as $data)
                            <tr class="user{{$data->id}}">
                                <td class="text-center">{{ $data->id }}</td>
                                <td class="text-center">{{ $data->userId }}</td>
                                <td class="text-center">{{ $data->userName }}</td>
                                <td class="text-center">{{ $data->doctorName }}</td>
                                <td class="text-center">{{ $data->dates }}</td>
                                <td class="text-center">{{ $data->time_period }}</td>
                                <td class="text-center">
                                    <a class="btn btn-info" href="edit/{{$data->id}}">修改</a>
                                    <a href="#" class="btn btn-danger" onclick="doDelete('{{$data->id}}','{{$data->userName}}')">刪除</a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--根據傳過來名稱連結-->
        {{$list->links()}}
    </div>
    </div>
    </div>
</body>

</html>