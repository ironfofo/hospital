@extends("admin.app")
@section("title","專業分科細項")
@section("content")

<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-auto">
            <a class="btnC" href="add">新增細項</a>
        </div>
        <div class="col-auto">
            <a class="btnD" href="javascript:doDelete('list')">刪除</a>
        </div>
    </div>

    <!-- Tab Navigation -->
    <ul class="nav nav-tabs mb-4" id="profesionalTab" role="tablist">
        @foreach($professional as $key => $pro)
            <li class="nav-item">
                <a class="nav-link {{ $key === 0 ? 'active' : '' }}" id="tab-{{ $pro->typeId }}" data-toggle="tab" href="#professional-{{ $pro->typeId }}" role="tab" aria-controls="professional-{{ $pro->typeId }}" aria-selected="{{ $key === 0 ? 'true' : 'false' }}">
                    {{ $pro->department }}
                </a>
            </li>
        @endforeach
    </ul>

    <!-- Tab Content -->
    <div class="tab-content">
        @foreach($professional as $key => $pro)
            <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}" id="professional-{{ $pro->typeId }}" role="tabpanel" aria-labelledby="tab-{{ $pro->typeId }}">
                <div class="card mb-4">
                    <div class="card-body">
                        <form name="list" id="list" method="post" action="delete">
                            {{ csrf_field() }}
                            <table class="table mt-3 table-striped">
                                <thead>
                                    <tr class="table-warning">
                                        <th class="col-1 text-center align-top">
                                            <input type="checkbox" class="form-check-input">
                                        </th>
                                        <th class="text-center">細項</th>
                                        <th class="text-center">修改</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($professional_layer1 as $prol)
                                        @if($pro->typeId == $prol->typeId)
                                            <tr>
                                                <td class="col-1 text-center">
                                                    <input type="checkbox" class="chk form-check-input border border-secondary" name="id[]" value="{{ $prol->id }}">
                                                </td>
                                                <td class="text-center">{{ $prol->layer1_name }}</td>
                                                <td class="text-center d-flex justify-content-center">
                                                    <a href="edit/{{ $prol->id }}" class="btnU">修改</a>  
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
@endsection
