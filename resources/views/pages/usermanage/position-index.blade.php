@extends('cms.cms-index')
@section('content')
    @include('cms.cms-alert')
    <div class="row layout-top-spacing">
        <div class="col-lg-4 col-12">
            <form action="{{ route('position.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center" style="font-size: 20px;">
                        <span>{{ $submenu1 }}</span>
                        <div>
                            <button type="submit" class="btn btn-rounded btn-outline-secondary"><i class="fa-solid fa-plus"></i> Save</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group mt-2 col-12">
                                <label for="name">Position Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" required placeholder="Input position name ...">
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group mt-2 col-12">
                                <label for="code">Position Code</label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" required placeholder="Input position code ...">
                                @error('code') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group mt-2 col-12">
                                <label for="sallary">Position Sallary</label>
                                <input type="text" class="form-control @error('sallary') is-invalid @enderror" name="sallary" required placeholder="Input sallary ...">
                                @error('sallary') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-8 col-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" style="font-size: 20px;">
                    <span>{{ $submenu }}</span>
                    <div>
                        <a href="{{ route('position.create') }}" class="btn btn-rounded btn-outline-primary"><i class="fa-solid fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="style-3" class="table style-3 dt-table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Record Id</th>
                                <th class="text-center">Position Name</th>
                                <th class="text-center">Positon Code</th>
                                <th class="text-center">Sallary</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($position as $key => $item)
                            <tr>
                                <td class="checkbox-column text-center"> {{ ++$key }} </td>
                                <td class="text-center"> {{ $item->name }} </td>
                                <td class="text-center"> {{ $item->code }} </td>
                                <td class="text-center"> {{ number_format($item->sallary, 0, ',', '.') }} </td>
                                <td class="text-center d-flex justify-content-center align-items-center">
                                    <a style="margin-right: 10px;" data-bs-toggle="modal" data-bs-target="#showPosition{{ $item->id }}" class="btn btn-rounded btn-outline-primary"><i class="fa-solid fa-eye"></i></a>
                                    <a style="margin-right: 10px;" data-bs-toggle="modal" data-bs-target="#editPosition{{ $item->id }}" class="btn btn-rounded btn-outline-secondary bs-tooltip me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                    <form id="delete-form-{{ $item->id }}" action="{{ route('position.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"
                                            data-url="{{ route('position.destroy', $item->id) }}" data-name="{{ $item->name }}"
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

    @foreach($position as $key => $item)
    <div class="modal fade" id="editPosition{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('position.update', $item->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-content">
                    <div class="modal-header" style="font-size: 20px;">
                        <h5 class="modal-title" id="tabsModalLabel">Edit Position</h5>
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
                        <div class="form-group">
                            <label for="name">Position Name</label>
                            <input type="text" class="form-control mb-2" name="name" id="name" placeholder="Enter position name..." value="{{ $item->name }}">
                        </div>
                        <div class="form-group">
                            <label for="code">Position Code</label>
                            <input type="text" class="form-control mb-2" name="code" id="code" placeholder="Enter position code..." value="{{ $item->code }}">
                        </div>
                        <div class="form-group">
                            <label for="sallary">Sallary</label>
                            <input type="text" class="form-control mb-2" name="sallary" id="sallary" placeholder="Enter sallary..." value="{{ number_format($item->sallary, 0, ',', '.') }}">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endforeach

    @foreach($position as $key => $item)
    <div class="modal fade" id="showPosition{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('position.update', $item->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-content">
                    <div class="modal-header" style="font-size: 20px;">
                        <h5 class="modal-title" id="tabsModalLabel">Show Position</h5>
                        <div class="d-flex justify-content-between align-items-center">

                            <button style="" type="button" class="btn btn-rounded btn-outline-warning" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa-solid fa-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name{{ $item->id }}">Position Name</label>
                            <input type="text" class="form-control mb-2" name="name{{ $item->id }}" id="name{{ $item->id }}" disabled placeholder="Enter position name..." value="{{ $item->name }}">
                        </div>
                        <div class="form-group">
                            <label for="code{{ $item->id }}">Position Code</label>
                            <input type="text" class="form-control mb-2" name="code{{ $item->id }}" id="code{{ $item->id }}" disabled placeholder="Enter position code..." value="{{ $item->code }}">
                        </div>
                        <div class="form-group">
                            <label for="code{{ $item->id }}">Sallary</label>
                            <input type="text" class="form-control mb-2" name="sallary{{ $item->id }}" id="sallary{{ $item->id }}" disabled placeholder="Enter sallary..." value="{{ number_format($item->sallary, 0, ',', '.') }}">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endforeach
@endsection
