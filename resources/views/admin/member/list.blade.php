@extends("admin.app")
@section("title","會員管理")
@section("content")
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="/css/myall.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/slick-theme.css">
    <link rel="stylesheet" href="/css/all.min.css">
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick.css?v=1.01">
    <link rel="stylesheet" href="/css/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
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
                                url: "/admin/member/delete",
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

    <!--如果有有message就顯示出來-->
    @if(Session::has("message"))
    <script>
        Swal.fire("{{Session::get('message')}}")
    </script>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4 mb-3">
                <a class="btn btn-primary" href="add">新增</a>
            </div>
            <table class="table table-bordered border-dark">
                <tr></i>
                    <th class="text-center">姓名</th>
                    <th class="text-center">信箱</th>
                    <th class="text-center">電話</th>
                    <th class="text-center">地址</ th>
                    <th class="text-center">生日</th>
                    <th class="text-center">帳號</th>
                    <th class="text-center">密碼</th>
                    <th class="text-center">等級</th>
                    <th class="text-center">修改</th>
                    <th class="text-center">刪除</th>
                </tr>
                @foreach($list as $data)
                <tr id="user{{$data->id}}" name="user{{$data->id}}">
                    <td class="text-center">{{ $data->userName }}</td>
                    <td class="text-center">{{ $data->email }}</td>
                    <td class="text-center">{{ $data->phone }}</td>
                    <td class="text-center">{{ $data->adr }}</td>
                    <td class="text-center">{{ $data->bir }}</td>
                    <td class="text-center">{{ $data->userId }}</td>
                    <td class="text-center">{{ $data->pwd }}</td>
                    <td>
                        <select name="prm[]" id="prm[]" class="form-select ">
                            <option value="10" {{ $data->prm == 10 ? "selected" : "" }}>一般會員</option>
                            <option value="20" class="bg-danger" {{ $data->prm == 20 ? "selected" : "" }}>VIP01</option>
                        </select>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-info" href="edit/{{$data->id}}">修改</a>
                    </td>
                    <td class="text-center">
                        <a href="#" class="btn btn-danger" onclick="doDelete('{{$data->id}}','{{$data->userName}}')">刪除</a>
                    </td>
                </tr>
                @endforeach
            </table>
            {{$list->links()}}
        </div>
    </div>
    <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/js/jquery-3.7.1.min.js"></script>
  <script src="https://unpkg.com/counterup2@2.0.2/dist/index.js"></script>
  <script src="/js/wow.min.js"></script>
  <script src="/js/sweetalert2@11.js"></script>
  <script src="/js/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
            // 為所有的下拉選單綁定 change 事件
            $(".form-select").change(function() {
                // 獲取選中的值
                const prm = $(this).val(); // 使用 this 獲取當前選擇的元素
                const userId = $(this).closest('tr').find('td:nth-child(6)').text(); // 獲取用戶 ID，假設是第六個單元格

                // 傳遞至後端API，更新帳號狀態
                $.ajax({
                    type: "POST",
                    url: "/admin/member/prmUpdate",
                    data: {
                        prm: prm,
                        userId: userId, // 傳遞用戶 ID
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(msg) {
                        Swal.fire("已修改會員等級");
                    },
                    error: function() {
                        alert("error-/admin/member/prmUpdate");
                    }
                });
            });
        });
    </script>
@endsection