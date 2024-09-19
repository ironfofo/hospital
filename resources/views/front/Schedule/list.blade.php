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
    <div class="row" style="background-image: url(images/banner/lukasz-szmigiel-2ShvY8Lf6l0-unsplash.jpg);background-size:cover;background-position:center center;background-attachment: fixed; height:50vh" alt="BANNER">
    </div>



    <div class="row">
        <h2 class="mt-3">看診科別</h2>

        <div class="tab">
            <button class="tablinks" onclick="openPr(event, 'InternalMedicine')" id="defaultOpen">內科</button>
            <button class="tablinks" onclick="openPr(event, 'Adjective')">外科</button>
            <button class="tablinks" onclick="openPr(event, 'Dental')">牙科</button>
            <button class="tablinks" onclick="openPr(event, 'orthopedics')">骨科</button>
            <button class="tablinks" onclick="openPr(event, 'dermatology')">皮膚科</button>
            <button class="tablinks" onclick="openPr(event, 'FelineDisease')">貓病科</button>
            <button class="tablinks" onclick="openPr(event, 'Inpatient')">住院部</button>
        </div>

        <div id="InternalMedicine" class="tabcontent">
        <h3>內科</h3>
            <div class="container">
                <div class="mt-5">
                    <div class="row ">
                        <div class="col-12 col-lg-4">
                            <div class="container">
                                <div class="row d-flex flex-column align-items-center ">
                                    <div class="box_roller" style="display: block;width:200px;  border-radius: 10px;">
                                        <div class="roller"><span class="fw-900">豪斯</span></div>
                                        <img class="doctor_img" src="/images/doctor/doctor1.jpg">
                                    </div>
                                    <a class="btn01 mt-3 me-auto" id="intro" href="#"><i class="fa fa-user"></i>醫師簡介</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-8 d_calender ">
                            <div class="row row-cols-7">
                                @foreach($dates as $date)
                                <div class="col text-03 mt-4">
                                    {{ $date['date'] }}<br>
                                    {{ $date['weekday'] }}
                                </div>
                                @endforeach
                            </div>

                            <div class="row row-cols-7 ">
                                @foreach($dates as $date)
                                <div class="col">
                                    @foreach($rest as $rests)
                                    @if($date['date']==$rests->dates)
                                    @if($rests->timeId==1)
                                    <a class="btn disabled" name="date"></a>
                                    @else
                                    <a class="btn" name="date">早
                                        <div class="room_info">
                                            <form action="/schedule/booking/insert" method="post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="userId">
                                                <input type="hidden" name="dates" value="{{$date['date']}}">
                                                <input type="hidden" name="timeId" value="1">
                                                <input type="hidden" name="doctorId" value="1">
                                                <span class="people_num">(?)</span>
                                                <button type="submit" class="btn03">預約</button>
                                            </form>
                                        </div>
                                    </a>
                                    @endif
                                    @else
                                    <a class="btn" name="date">早
                                        <div class="room_info">
                                            <form action="/schedule/booking/insert" method="post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="dates" value="{{$date['date']}}">
                                                <input type="hidden" name="timeId" value="1">
                                                <input type="hidden" name="doctorId" value="1">
                                                <span class="people_num">(?)</span>
                                                <button type="submit" class="btn03">預約</button>
                                            </form>
                                        </div>
                                    </a>
                                    @endif
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                            <div class="row row-cols-7 ">
                                @foreach($dates as $date)
                                <div class="col">
                                    @foreach($rest as $rests)
                                    @if($date['date']==$rests->dates)
                                    @if($rests->timeId==2)
                                    <a class="btn disabled" name="date"></a>
                                    @else
                                    <a class="btn" name="date">中
                                        <div class="room_info">
                                            <form action="/schedule/booking/insert" method="post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="dates" value="{{$date['date']}}">
                                                <input type="hidden" name="timeId" value="2">
                                                <input type="hidden" name="doctorId" value="2">
                                                <span class="people_num">(?)</span>
                                                <button type="submit" class="btn03">預約</button>
                                            </form>
                                        </div>
                                    </a>
                                    @endif
                                    @else
                                    <a class="btn" name="date">中
                                        <div class="room_info">
                                            <form action="/schedule/booking/insert" method="post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="dates" value="{{$date['date']}}">
                                                <input type="hidden" name="timeId" value="2">
                                                <input type="hidden" name="doctorId" value="2">
                                                <span class="people_num">(?)</span>
                                                <button type="submit" class="btn03">預約</button>
                                            </form>
                                        </div>
                                    </a>
                                    @endif
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                            <div class="row row-cols-7 ">
                                @foreach($dates as $date)
                                <div class="col">
                                    @foreach($rest as $rests)
                                    @if($date['date']==$rests->dates)
                                    @if($rests->timeId==3)
                                    <a class="btn disabled" name="date"></a>
                                    @else
                                    <a class="btn" name="date">晚
                                        <div class="room_info">
                                            <form action="/schedule/booking/insert" method="post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="dates" value="{{$date['date']}}">
                                                <input type="hidden" name="timeId" value="3">
                                                <input type="hidden" name="doctorId" value="3">
                                                <span class="people_num">(?)</span>
                                                <button type="submit" class="btn03">預約</button>
                                            </form>
                                        </div>
                                    </a>
                                    @endif
                                    @else
                                    <a class="btn" name="date">晚
                                        <div class="room_info">
                                            <form action="/schedule/booking/insert" method="post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="dates" value="{{$date['date']}}">
                                                <input type="hidden" name="timeId" value="3">
                                                <input type="hidden" name="doctorId" value="3">
                                                <span class="people_num">(?)</span>
                                                <button type="submit" class="btn03">預約</button>
                                            </form>
                                        </div>
                                    </a>
                                    @endif
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div id="Adjective" class="tabcontent">
            <h3>外科</h3>
            <p>Paris is the capital of France.</p>
        </div>
        <div id="Dental" class="tabcontent">
            <h3>牙科</h3>
            <p>Paris is the capital of France.</p>
        </div>
        <div id="orthopedics" class="tabcontent">
            <h3>骨科</h3>
            <p>Paris is the capital of France.</p>
        </div>
        <div id="dermatology" class="tabcontent">
            <h3>皮膚科</h3>
            <p>Paris is tal of France.</p>
        </div>
        <div id="FelineDisease" class="tabcontent">
            <h3>貓病科</h3>
            <p>Paris is the capital of France.</p>
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

    </script>
</body>
@endsection