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
        <table class="table table-bordered border-dark">
            <tr>
                <th class="col-1 text-center">姓名</th>
                <th class="col-1 text-center">信箱</th>
                <th class="col-1 text-center">電話</th>
                <th class="col-2 text-center">地址</th>
                <th class="col-2 text-center">生日</th>
                <th class="col-2 text-center">帳號</th>
                <th class="col-1 text-center">密碼</th>
                <th class="col-1 text-center">修改</th>
                <th class="col-1 text-center">刪除</th>
            </tr>
            {{-- $list是資料庫MemberController.php的$list --}}
            @foreach($list as $data)
            <tr class="user{{$data->id}}">
                <td class="text-center">{{ $data->userName }}</td>
                <td class="text-center">{{ $data->email }}</td>
                <td class="text-center">{{ $data->phone }}</td>
                <td class="text-center">{{ $data->adr }}</td>
                <td class="text-center">{{ $data->bir }}</td>
                <td class="text-center">{{ $data->userId }}</td>
                <td class="text-center">{{ $data->pwd }}</td>
                <td class="text-center">
                    <a class="btn btn-info" href="edit/{{$data->id}}">修改</a>
                </td>
                <td class="text-center">
                    <a href="#" class="btn btn-danger" onclick="doDelete('{{$data->id}}','{{$data->userName}}')">刪除</a>
                </td>
            </tr>
            {{-- @endforeach相當於php的結束 --}}
            @endforeach
        </table>
        <!--根據傳過來名稱連結-->
        {{$list->links()}}
    </div>
    </div>
    </div>
</body>

</html>