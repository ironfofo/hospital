@extends("front.comm")
@section("content")
<script src="/js/html2canvas.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">

<div class="container mt-5 mb-5">
    <div class="row mt-5">
        <div class="col-12 mt-5">
            <a href="Professional" class="btn btn-secondary mt-3">回上頁</a>
            <div class="card mt-3">
                <h3 class="card-title text-center mt-3">預約</h3>
                <div class="card-body">
                    <form action="/booking/booking" method="POST" name="list" id="list">
                        {{csrf_field()}}
                        <input type="hidden" name="bookingId">
                        <div class="row">
                            <div class="col-2 text-end">姓名</div>
                            <div class="col-10">
                                <input type="text" class="form-control input01" name="userName">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 text-end">醫師</div>
                            <div class="col-10">
                                <select name="doctorId" id="doctorId" class="form-select">
                                    @foreach($doctor as $data1)
                                    <option value="{{$data1->doctorId}}">{{$data1->doctorName}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 text-end">日期</div>
                            <div class="col-10">
                                <input type="date" class="form-input" name="dates" id="dates">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 text-end">時間</div>
                            <div class="col-10">
                                <select name="timeId" id="timeId" class="form-select">
                                    @foreach($sch as $data2)
                                    <option value="{{$data2->timeId}}">{{$data2->times}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 text-end">寵物名字</div>
                            <div class="col-10">
                                <input type="text" class="form-control" name="petName">
                            </div>
                        </div>


                        <div class="row mt-4 ">
                            <div class="col-12  d-flex justify-content-center">
                                <button type="submit" class="btn01"><span class="text">確定</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection