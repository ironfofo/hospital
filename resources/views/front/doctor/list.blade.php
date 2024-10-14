@extends("front.comm")
@section("content")
<style>


.title {
    font-size: 18px;
    font-weight: bold;
    color: #FFC107; /* 蜜蜂黃色 */
    margin-bottom: 10px;
}



.doctor-container {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    background-color: white; /* 白色背景 */
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.row .fw-600 {
    font-weight: 600;
    color: #4CAF50; /* 草綠色 */
}

.doctor-img {
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* 添加陰影 */
}

</style>
    
    <div data-scroll-watch="" class="fade_in title">
        <div class="breadcrumbs"><a href="/">首頁</a> / <span>醫師介紹</span></div>
    </div>

    @foreach($doctor as $data)
    <div class="container doctor-container mt-5 mb-5">
        <div class="row">
            <div class="col-4 d-flex justify-content-center">
                <img src="/images/doctor/{{$data->photo}}" class="img-fluid doctor-img" alt="{{$data->doctorName}}">    
            </div>
            <div class="col-8">
                <div class="row mt-3">
                    <div class="fw-600">姓名:</div>
                    <div>{{$data->doctorName}}</div>
                </div>
                <div class="row mt-3">
                    <div class="fw-600">職稱:</div>
                    <div>{{$data->position}}</div>
                </div>
                <div class="row mt-3">
                    <div class="fw-600">學歷:</div>
                    <div>{{$data->edu}}</div>
                </div>
                <div class="row mt-3">
                    <div class="fw-600">介紹:</div>
                    <div>{!!$data->content!!}</div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
