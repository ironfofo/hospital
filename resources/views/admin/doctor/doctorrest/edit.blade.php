@extends("admin.app")
@section("title","編輯醫師休假表")
@section("content")

<link rel="stylesheet" href="/css/myall.css">
<!-- 引入 jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- 引入 Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- 查詢用 -->
<div class="container">
    <div class="row mb-1">
        <div class="col text-right ">
            <form action="{{ url('/admin/doctor/doctorrest/edit') }}" method="GET">
                <input type="date" name="date" class="form-control" value="{{ $startDate->format('Y-m-d') }}">
                <button type="submit" class="btn btn-primary mt-2">查詢</button>
            </form>
        </div>
    </div>

    <!-- Tab Navigation -->
    <ul class="nav nav-tabs mb-4" id="doctorTab" role="tablist">
        @foreach($doctor as $key => $doc)
            <li class="nav-item">
                <a class="nav-link {{ $key === 0 ? 'active' : '' }}" id="tab-{{ $doc->doctorId }}" data-toggle="tab" href="#doctor-{{ $doc->doctorId }}" role="tab" aria-controls="doctor-{{ $doc->doctorId }}" aria-selected="{{ $key === 0 ? 'true' : 'false' }}">
                    {{ $doc->doctorName }}
                </a>
            </li>
        @endforeach
    </ul>

    <!-- Tab Content -->
    <div class="tab-content">
    @foreach($doctor as $key => $doc)
        <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}" id="doctor-{{ $doc->doctorId }}" role="tabpanel" aria-labelledby="tab-{{ $doc->doctorId }}">
            <form id="doctorrestForm" action="/admin/doctor/doctorrest/update" method="post">
                {{csrf_field()}}
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">日期</th>
                            @foreach($dates as $date)
                                <th scope="col">{{ $date['date'] }} <br> ({{ $date['weekday'] }})</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>{{ $doc->doctorName }}</strong></td>
                            @foreach($dates as $date)
                                @php
                                    $scheduleForDate = $doctorSchedule[$doc->doctorId] ?? [];
                                @endphp

                                <td>     
                                    @foreach($TimeList as $time)
                                        @php
                                            $isRest = $scheduleForDate[$time->timeId][$date['date']] ?? false;
                                            $checkboxName = "schedule[{$doc->doctorId}][{$date['date']}][{$time->timeId}]";
                                        @endphp
                                       
                                        <div class="mb-2">
                                                {{ csrf_field() }}
                                                <input type="checkbox" name="{{ $checkboxName }}[checked]" value="1" {{ $isRest ? 'checked' : '' }}>
                                                <input type="hidden" name="{{ $checkboxName }}[doctorId]" value="{{ $doc->doctorId }}">
                                                <input type="hidden" name="{{ $checkboxName }}[dates]" value="{{ $date['date'] }}">
                                                <input type="hidden" name="{{ $checkboxName }}[timeId]" value="{{ $time->timeId }}">
                                            @if($isRest)
                                                <label type="button" class="btn04">休息</label>
                                            @else
                                                <label type="button" class="btn05">上班</label>
                                            @endif    
                                        </div>
                                    @endforeach
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                    <div class="col-auto mt-1 mb-3">
                        <button class="btn01" type="submit">儲存</button>
                    </div>
                </table>
            </div>
        </form>
        </div>
    @endforeach
</div>  


</div>



@endsection
