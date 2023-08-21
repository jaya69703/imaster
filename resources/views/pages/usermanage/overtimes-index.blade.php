@extends('cms.cms-index')
@section('content')
    @include('cms.cms-alert')
    <div class="row layout-top-spacing">
        <div class="col-lg-12 col-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" style="font-size: 20px;">
                    <span>{{ $submenu }}</span>
                    <div>
                        <a href="{{ route('overtimes.create') }}" class="btn btn-rounded btn-outline-primary"><i class="fa-solid fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="style-3" class="table style-3 dt-table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Record Id</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Time</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($overtimes as $key => $item)
                            <tr>
                                <td class="checkbox-column text-center"> {{ ++$key }} </td>
                                <td class="text-center"> {{ $item->user->name }} </td>
                                <td class="text-center"> {{ $item->overtime_date }} </td>
                                <td class="text-center"> {{ $item->overtime_start . (' - ') . $item->overtime_end }} </td>
                                @if( $item->overtime_stat === 'Approved' )
                                <td class="text-center"><span class="shadow-none badge badge-success">Approved</span></td>
                                @else
                                <td class="text-center"><span class="shadow-none badge badge-warning">Pending</span></td>
                                @endif
                                <td class="text-center d-flex justify-content-center align-items-center">
                                    <a style="margin-right: 10px;" data-bs-toggle="modal" data-bs-target="#showOvertimes{{ $item->id }}" class="btn btn-rounded btn-outline-primary"><i class="fa-solid fa-eye"></i></a>
                                    <a style="margin-right: 10px;" data-bs-toggle="modal" data-bs-target="#editOvertimes{{ $item->id }}" class="btn btn-rounded btn-outline-secondary bs-tooltip me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                    <form id="delete-form-{{ $item->id }}" action="{{ route('overtimes.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"
                                            data-url="{{ route('overtimes.destroy', $item->id) }}" data-name="{{ $item->name }}"
                                            onclick="deleteData('{{ $item->id }}')">
                                            <i class="fa-solid fa-trash-can"></i>
                                         </a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @foreach($overtimes as $key => $item)
    <div class="modal fade" id="editOvertimes{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('overtimes.update', $item->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-content">
                    <div class="modal-header" style="font-size: 20px;">
                        <h5 class="modal-title" id="tabsModalLabel">{{ $submenu }}</h5>
                        <div class="d-flex justify-content-between align-items-center">

                            <button style="margin-right: 10px;" type="submit" class="btn btn-rounded btn-outline-secondary" data-bs-dismiss="modal">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                            <button style="" type="button" class="btn btn-rounded btn-outline-warning" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa-solid fa-close"></i>
                            </button>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="form-group mb-2 mt-2">
                            <label for="overtime_stat">Overtimes Status</label>
                            <select name="overtime_stat" id="overtime_stat" class="form-select">
                                <option value="">Pilih Status</option>
                                <option value="Pending"> Pending </option>
                                <option value="Approved"> Approved </option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endforeach

    @foreach($overtimes as $key => $item)
    <div class="modal fade" id="showOvertimes{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('overtimes.update', $item->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-content">
                    <div class="modal-header" style="font-size: 20px;">
                        <h5 class="modal-title" id="tabsModalLabel">{{ $submenu }}</h5>
                        <div class="d-flex justify-content-between align-items-center">

                            <button style="" type="button" class="btn btn-rounded btn-outline-warning" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa-solid fa-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="img">
                            <img id="image-preview" src="{{ asset('storage/images/overtime_proof/'. $item->overtime_proof ) }}" alt="Photo Profile" class="card-img-top">
                            <input class="form-control mt-2 mb-2" type="file" id="image" disabled name="overtime_proof" accept="image/*">
                        </div>
                        <div class="form-group mb-2 mt-2">
                            <label for="overtime_date">Overtimes Date</label>
                            <input type="date" class="form-control" disabled name="overtime_date" value="{{ $item->overtime_date}}">
                        </div>
                        <div class="form-group mb-2 mt-2">
                            <label for="overtime_start">Overtimes Start</label>
                            <input type="time" disabled name="overtime_start" id="overtime_start" class="form-control" value="{{ $item->overtime_start}}">
                        </div>
                        <div class="form-group mb-2 mt-2">
                            <label for="overtime_end">Overtimes End</label>
                            <input type="time" disabled name="overtime_end" id="overtime_end" class="form-control"  value="{{ $item->overtime_end}}">
                        </div>
                        <div class="form-group mb-2 mt-2">
                            <label for="overtime_desc">Overtimes Description</label>
                            <textarea disabled name="overtime_desc" id="overtime_desc" cols="60" rows="10" class="form-control">{{ $item->overtime_desc }}</textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endforeach
@endsection
