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
    <link rel="stylesheet" href="/css/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">


    <!--如果有有message就顯示出來-->
    @if(Session::has("message"))
    <script>
        Swal.fire("{{Session::get('message')}}")
    </script>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-auto mb-3">
                <div class="row">
                    <div class="col-3">
                        <a class="btnC" href="add"><i class="fa-solid fa-plus"></i>新增</a>
                    </div>
                    <div class="col-9">
                        <form action="/admin/member/search" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" id="search" placeholder="請輸入姓名或帳號" aria-label="請輸入姓名或帳號" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">搜尋</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            

            <div class="card shadow-lg" id="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <tr>
                                <th class="text-center text-nowrap">姓名</th>
                                <th class="text-center text-nowrap">信箱</th>
                                <th class="text-center text-nowrap">電話</th>
                                <th class="text-center text-nowrap">地址</th>
                                <th class="text-center text-nowrap">生日</th>
                                <th class="text-center text-nowrap">帳號</th>
                                <th class="text-center text-nowrap">密碼</th>
                                <th class="text-center text-nowrap">等級</th>
                                <th class="text-center text-nowrap">修改</th>
                                <th class="text-center text-nowrap">權限</th>
                            </tr>
                            @foreach($list as $data)
                            <tr id="user{{$data->id}}" name="user{{$data->id}}">
                                <td class="text-center text-nowrap">{{ $data->userName }}</td>
                                <td class="text-center text-nowrap">{{ $data->email }}</td>
                                <td class="text-center text-nowrap">{{ $data->phone }}</td>
                                <td class="text-center text-nowrap">{{ $data->adr }}</td>
                                <td class="text-center text-nowrap">{{ $data->bir }}</td>
                                <td class="text-center text-nowrap">{{ $data->userId }}</td>
                                <td class="text-center text-nowrap">{{ $data->pwd }}</td>
                                <td class="text-center text-nowrap {{$data->text_color}} align-middle"><i class="{{ $data->icon }}"></i>{{ $data->prmTitle }}</td>
                                <td class="justify-content-center">
                                    <a class="btnU" href="edit/{{$data->id}}"><i class="fa-solid fa-pencil"></i></a>
                                </td>
                                <td>
                                    <div class="form-check form-switch">
                                        @if($data->state == 1)
                                        <input type="checkbox" checked class="form-check-input bg-success state" name="state" id="state{{$data->id}}" value="{{ $data->state }}">
                                        <label for="state{{$data->id}}" class="form-check-label">啟用</label>
                                        @else
                                        <input type="checkbox" class="form-check-input bg-danger state" name="state" id="state{{$data->id}}" value="{{ $data->state }}">
                                        <label for="state{{$data->id}}" class="form-check-label" >停用</label>
                                        @endif
                                    </div>    
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            {{$list->links()}}
        </div>
    </div>
    <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/js/jquery-3.7.1.min.js"></script>
  <script src="https://unpkg.com/counterup2@2.0.2/dist/index.js"></script>
  <script src="/js/wow.min.js"></script>
  <script src="/js/sweetalert2@11.js"></script>
  <script src="/js/jquery-ui.min.js"></script>
    <!-- <script>
        $(document).ready(function() {
            $("#card").html("");
            let userId = $("#search").val();
            $.ajax({
                url: "/admin/member/search",
                type: "post",
                data: {
                    userId: userId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(msg) {
                    $("#card").html(msg);
                }
            });

        });
    </script> -->

<script>
    $(document).ready(function() {
        $(".state").change(function(){
            var $this = $(this);
            var id=$this.attr("id").replace("state","");//獲取當前id，並將state替換成空字串
            var state;
            if($this.is(":checked")){
                $this.next().text("啟用");
                $this.addClass("bg-success");
                $this.removeClass("bg-danger");
                state="1";
            }else{
                $this.next().text("停權");
                $this.addClass("bg-danger");
                $this.removeClass("bg-success");
                state="0";
            }
            $.ajax({
                url: "/admin/member/state",
                type: "post",
                data: {
                    id: id,
                    state: state,
                    _token: "{{ csrf_token() }}"                
                },
                success: function(msg) {
                    if (msg.message == "ok") {
                        Swal.fire("已變更");
                    }
                }
            });
        });
    })
</script>
@endsection