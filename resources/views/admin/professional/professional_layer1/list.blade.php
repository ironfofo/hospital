@extends("admin.app")
@section("title","專業分科細項")
@section("content")

    <!-- Tab Navigation -->
    <ul class="nav nav-tabs mb-4" id="profesionalTab" role="tablist">
        @foreach($professional as $key => $pro)
            <li class="nav-item">
                <a class="nav-link {{ $key === 0 ? 'active' : '' }}" id="tab-{{ $pro->typeId }}" data-toggle="tab" href="#professional-{{ $pro->typeId }}" role="tab" aria-controls="professional-{{ $pro->typeId }}" aria-selected="{{ $key === 0 ? 'true' : 'false' }}">
                    {{ $pro->department }}
                    @dump($pro)
                    {{$pro->layer1_name}}
                </a>
            </li>
        @endforeach
    </ul>

    <!-- Tab Content -->
    <div class="tab-content">
    @foreach($professional as $key => $pro)
        <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}" id="professoinal-{{ $pro->typeId }}" role="tabpanel" aria-labelledby="tab-{{ $pro->typeId }}">
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead class="thead-light">
                         <tr>
                            <th scope="col">細項</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $layer1_name = explode(',', $pro->layer1_name);
                        @endphp

                        <ul>
                            @foreach($layer1_name as $name)
                                <li>{{ $name }}</li>
                            @endforeach
                        </ul>
                    </tbody>
                </table>
            </div>
            <div class="col-auto mt-1 mb-3">
                <a class="btn01" href="edit">新增</a>
            </div>
        </div>
    @endforeach
    </div>  
    <script>
    </script>

@endsection
