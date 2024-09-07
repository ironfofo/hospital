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
            width: 30%;
            height: 500px;
        }

        /* Style the buttons inside the tab */
        .tab button {
            display: block;
            background-color: inherit;
            color: black;
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
            height: 500px;
        }
    </style>
</head>

<body>
    <div class="row" style="background-image: url(images/banner/lukasz-szmigiel-2ShvY8Lf6l0-unsplash.jpg);background-size:cover;background-position:center center;background-attachment: fixed; height:50vh" alt="BANNER">
    </div>



    <div class="row">
        <h2 class="mt-3">看診科別</h2>

        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'InternalMedicine')" id="defaultOpen">內科</button>
            <button class="tablinks" onclick="openCity(event, 'Adjective')">外科</button>
            <button class="tablinks" onclick="openCity(event, 'Dental')">牙科</button>
            <button class="tablinks" onclick="openCity(event, 'orthopedics')">骨科</button>
            <button class="tablinks" onclick="openCity(event, 'dermatology')">皮膚科</button>
            <button class="tablinks" onclick="openCity(event, 'FelineDisease')">貓病科</button>
            <button class="tablinks" onclick="openCity(event, 'Inpatient')">住院部</button>
        </div>

        <div id="InternalMedicine" class="tabcontent">
            <h3>內科</h3>
            <p>London is the capital city of England.</p>
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
        function openCity(evt, professional) {
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

</body>
@endsection