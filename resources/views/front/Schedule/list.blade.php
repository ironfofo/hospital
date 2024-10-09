@extends("front.comm")
@section("content")

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box
        }

        body {
            font-family: "Lato", sans-serif;
        }

        /* Style the tab */
        .tab {
            float: left;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            width: 20%;
            height: 500px;
        }

        /* Style the buttons inside the tab */
        .tab button {
            display: block;
            background-color: inherit;
            /* color: black; */
            padding: 22px 16px;
            width: 100%;
            border: none;
            outline: none;
            text-align: left;
            cursor: pointer;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current "tab button" class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            float: left;
            padding: 0px 12px;
            border: 1px solid #ccc;
            width: 70%;
            border-left: none;

        }
    </style>
</head>

<body>
    <div class="row" style="background-image: url(/images/banner/lukasz-szmigiel-2ShvY8Lf6l0-unsplash.jpg);background-size:cover;background-position:center center;background-attachment: fixed; height:40vh" alt="BANNER">
    </div>



    <div class="row">
        <h2 class="mt-3">看診科別</h2>

        <div class="tab">
            @foreach($doctor as $doc)
            <button class="tablinks" onclick="openPr(event, '{{$doc->lan}}')" id="defaultOpen">{{$doc->department}}</button>
            @endforeach
        </div>

        @foreach($doctor as $doc)
        <div id="{{$doc->lan}}" class="tabcontent">
            <h3>{{$doc->department}}</h3>
            <div class="container">
                <div class="mt-5">
                    <div class="row ">
                        <div class="col-12 col-lg-4">
                            <div class="container">
                                <div class="row d-flex flex-column align-items-center ">
                                    <div class="box_roller" style="display: block;width:200px;  border-radius: 10px;">
                                        <div class="roller"><span class="fw-900">{{$doc->doctorName}}</span></div>
                                        <img class="doctor_img" src="/images/doctor/{{$doc->photo}}">
                                    </div>
                                    <a class="btn01 mt-3 me-auto" id="intro" href="#"><i class="fa fa-user"></i>醫師簡介</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-8 d_calender ">
                            <div class="row row-cols-7">
                                @foreach($dates as $date)
                                <div class="col text-0 mt-4">
                                    {{ $date['date'] }}<br>
                                    {{ $date['weekday'] }}
                                </div>
                                @endforeach
                            </div>


                            <div class="row row-cols-7">
                            @foreach($dates as $date)
                                <div class="col">
                                    @php
                                        $isRest = false;
                                        foreach($rest as $rests) {
                                            if ($rests->doctorId == $doc->doctorId && $date['date'] == $rests->dates  && $rests->timeId==1) {
                                                $isRest = true;
                                                break;
                                            }
                                        }
                                    @endphp

                                    @if($isRest)
                                        <a class="btn disabled" name="date">休</a>
                                    @else
                                        <a class="btn" name="date" onclick="doBooking(event, this)">早
                                            <div>
                                                <form id="bookingForm" action="/schedule/booking/insert" method="post" onsubmit="return false">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="userId">
                                                    <input type="hidden" name="dates" value="{{ $date['date'] }}">
                                                    <input type="hidden" name="timeId" value="1">
                                                    <input type="hidden" name="doctorId" value="1">
                                                    <span class="people_num text-danger fw-100" >({{ $count1[$date['date']] ?? 0 }}人)
                                                    </span>
                                                    <input type="hidden" name="submitType" value="早">
                                                </form>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                            @endforeach
                            </div>


                            <div class="row row-cols-7">
                            @foreach($dates as $date)
                                <div class="col">
                                    @php
                                        $isRest = false;
                                        foreach($rest as $rests) {
                                            if ($rests->doctorId == $doc->doctorId && $date['date'] == $rests->dates  && $rests->timeId==2) {
                                                $isRest = true;
                                                break;
                                            }
                                        }
                                    @endphp

                                    @if($isRest)
                                        <a class="btn disabled" name="date">休</a>
                                    @else
                                        <a class="btn" name="date" onclick="doBooking(event, this)">午
                                            <div>
                                                <form id="bookingForm" action="/schedule/booking/insert" method="post" onsubmit="return false">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="userId">
                                                    <input type="hidden" name="dates" value="{{ $date['date'] }}">
                                                    <input type="hidden" name="timeId" value="2">
                                                    <input type="hidden" name="doctorId" value="1">
                                                    <span class="people_num text-danger fw-100" >({{ $count2[$date['date']] ?? 0 }}人)
                                                    </span>
                                                </form>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                            @endforeach
                            </div>

                            <div class="row row-cols-7">
                            @foreach($dates as $date)
                                <div class="col">
                                    @php
                                        $isRest = false;
                                        foreach($rest as $rests) {
                                            if ($rests->doctorId == $doc->doctorId && $date['date'] == $rests->dates  && $rests->timeId==3) {
                                                $isRest = true;
                                                break;
                                            }
                                        }
                                    @endphp

                                    @if($isRest)
                                        <a class="btn disabled" name="date">休</a>
                                    @else
                                        <a class="btn" name="date" onclick="doBooking(event, this)">晚
                                            <div>
                                                <form id="bookingForm" action="/schedule/booking/insert" method="post" onsubmit="return false">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="userId">
                                                    <input type="hidden" name="dates" id="dates" value="{{ $date['date'] }}">
                                                    <input type="hidden" name="timeId" id="timeId" value="3">
                                                    <input type="hidden" name="doctorId" value="{{$doc->doctorId}}">
                                              
                                                    <span class="people_num text-danger fw-100" >({{ $count3[$date['date']] ?? 0 }}人)
                                                    </span>
                                                </form>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

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
        function doBooking(event,element) {
            event.preventDefault(); //防止默認行為，與onsubmit="return false"類似
            const form=element.querySelector("form");//獲取當前表單
            const date=element.querySelector('input[name="dates"]').value;//獲取當前日期
            const timeId=element.querySelector('input[name="timeId"]').value;//獲取當前時段
            Swal.fire({
                title: '確定要預約'+date+'的'+timeId+'的時段?',
                text: "",
                icon: "question",
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
</body>
@endsection