@extends("front.comm")
@section("content")

<style>
    * {
        box-sizing: border-box;
    }

    body {
        font-family: "Lato", sans-serif;
    }

    /* Style the tab */
    .tab {
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        height: auto;
        margin: 0;
    }

    /* Style the buttons inside the tab */
    .tab button {
        display: block;
        background-color: inherit;
        padding: 10px; /* 減小內邊距 */
        width: 100%;
        border: none;
        outline: none;
        text-align: left;
        cursor: pointer;
        transition: 0.3s;
        font-size: 16px; /* 在小屏幕上減小字體大小 */
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current "tab button" class */
    .tab button.active {
        background-color: var(--mycolor02);
    }

    /* Style the tab content */
    .tabcontent {
        padding: 10px;
        border: 1px solid #ccc;
        border-left: none;
        display: none;
    }

    .doctor_img {
        width: 100%; /* 使圖片自適應寬度 */
        height: auto;/
    }

    .btn03, .btn {
        width: 100%;
        margin-bottom: 10px; /* 添加間距 */
    }


    /* RWD for mobile */
    @media (max-width: 768px) {
        .tab {
            width: 100%; /* 在小屏幕上使標籤佔滿整個寬度 */
            margin-bottom: 20px; /* 增加底部間距 */
        }

        .tabcontent {
            width: 100%;
            padding: 10px; /* 在小屏幕上減小內邊距 */
        }

        .doctor_img {
            height: auto; /* 保持比例 */
        }

        .d_calender {
            text-align: center; /* 按鈕文字居中 */
        }

        /* 調整卡片樣式 */
        .card02 {
            padding: 1em; /* 減小內邊距以適應小屏幕 */
            gap: 0.5em; /* 減小元素之間的間距 */
        }

        /* 確保按鈕不會超出視窗 */
        .btn {
            padding: 10px; /* 減小按鈕內邊距 */
            font-size: 14px; /* 減小按鈕字體 */
        }
    }

</style>


<div class="row" style="background-image: url(/images/banner/lukasz-szmigiel-2ShvY8Lf6l0-unsplash.jpg);background-size:cover;background-position:center center;background-attachment: fixed; height:20vh">
</div>

<div class="container">
    <div class="row">
        <h3 class="col-12 mt-3">預約您的醫生</h3>
        <div class="col-12 d-flex justify-content-end">
            @if ($showPrevWeekButton)
            <a href="{{ route('schedule.list', ['date' => $startDate->copy()->subWeek()->format('Y-m-d')]) }}" class="pages"><=上一周</a>
            @endif

            @if ($showNextWeekButton)
            <a href="{{ route('schedule.list', ['date' => $startDate->copy()->addWeek()->format('Y-m-d')]) }}" class="pages">下一周=></a>
            @endif
        </div>

        <div class="tab col-12 col-md-3"> <!-- 在中型及以上設備上占3列 -->
            @foreach($doctor as $doc)
            <button class="tablinks" onclick="openPr(event, '{{$doc->lan}}')" id="defaultOpen">{{$doc->department}}</button>
            @endforeach
        </div>

        @foreach($doctor as $doc)
        <div id="{{$doc->lan}}" class="tabcontent col-12 col-md-9"> <!-- 在中型及以上設備上占9列 -->
            <h3 class="ms-4">{{$doc->department}}</h3>
            <div class="container">
                <div class="mt-1">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="container">
                                <div class="row d-flex flex-column align-items-center">
                                    <div class="card02">
                                        <div class="box_roller" style="display: block;width:100%; border-radius: 10px;">
                                            <div class="roller"><span class="fw-900">{{$doc->doctorName}}</span></div>
                                            <img class="doctor_img" src="/images/doctor/{{$doc->photo}}">
                                        </div>
                                        <a class="btn03 mt-3" id="intro" href="/doctor/list"><i class="fa fa-user"></i>醫師簡介</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-8 d_calender">

                            <div class="row row-cols-7">
                                @foreach($dates as $date)
                                <div class="col text-0 mt-4">
                                    {{ $date['date'] }}<br>
                                    {{ $date['weekday'] }}
                                </div>
                                @endforeach
                            </div>

                            @foreach($TimeList as $time)
                            <div class="row row-cols-7">
                                @foreach($dates as $date)
                                    <div class="col">
                                        @if($doctorSchedule[$doc->doctorId][$time->timeId][$date['date']])
                                            <button class="btn disabled" name="date">休</button>
                                        @else
                                        <form id="bookingForm" action="/schedule/booking/insert" method="post" onsubmit="return false">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="userId">
                                            <input type="hidden" name="dates" value="{{ $date['date'] }}">
                                            <input type="hidden" name="timeId" value="{{ $time->timeId }}">
                                            <input type="hidden" name="doctorId" value="{{ $doc->doctorId }}">
                                            <button class="btn" type="button" onclick="doBooking(event, this)">
                                                {{ $time->time_period }}
                                                <span class="people_num text-danger fw-100">({{ $counts[$doc->doctorId][$time->timeId][$date['date']] ?? 0}}人)</span>
                                            </button>
                                        </form>

                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    function openPr(evt, professional) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(professional).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>

<script>
    const timeList = @json($TimeList); // 將 TimeList 和 doctorName 資料以json格式傳遞到 JavaScript 中
    const doctor = @json($doctorName);

    function doBooking(event, element) {
        event.preventDefault(); // 防止默認行為
        const form = element.querySelector("form"); // 獲取當前表單
        const date = element.querySelector('input[name="dates"]').value; // 獲取當前日期
        const timeId = element.querySelector('input[name="timeId"]').value; // 獲取當前時段
        const doctorId = element.querySelector('input[name="doctorId"]').value; // 獲取當前醫生ID

        const timePeriod = (timeList[timeId - 1] && timeList[timeId - 1].time_period); // 根據 timeId 從 timeList 中獲取時段名稱
        const doctorName = (doctor[doctorId - 1] && doctor[doctorId - 1].doctorName);

        Swal.fire({
            title: '確定要預約' + doctorName + '醫師?',
            text: date + ' 的 ' + timePeriod + ' 時段',
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "確定預約",
            cancelButtonText: "不登預約",
        }).then((result) => {
            if (result.isConfirmed) {
                // 確定預約，提交表單
                form.submit();
                Swal.fire("已預約").then(() => {
                    location.reload(); // 刷新頁面
                });
            }
        });
    }
</script>

@endsection
