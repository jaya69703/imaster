@extends('cms.cms-index')
@section('content')
    @include('cms.cms-alert')
    <div class="row layout-top-spacing">
        <div class="col-lg-12 col-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" style="font-size: 20px;">
                    <span>{{ $submenu }}</span>
                    <div>
                        <a href="{{ route('usermanage.create') }}" class="btn btn-rounded btn-outline-primary"><i class="fa-solid fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="style-3" class="table style-3 dt-table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Record Id</th>
                                <th class="text-center">Fullname</th>
                                <th class="text-center">Position</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone Number</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $key => $item)
                            <tr>
                                <td class="checkbox-column text-center"> {{ ++$key }} </td>
                                <td class="text-center"> {{ $item->name }} </td>
                                <td class="text-center"> {{ $item->position->name }} </td>
                                <td class="text-center"> {{ $item->email }} </td>
                                <td class="text-center"> {{ $item->phone }} </td>
                                <td class="text-center d-flex justify-content-center align-items-center">
                                    <a style="margin-right: 10px;" href="{{ route('usermanage.show', $item->id) }}" class="btn btn-rounded btn-outline-primary"><i class="fa-solid fa-eye"></i></a>
                                    <a style="margin-right: 10px;" href="{{ route('usermanage.edit', $item->id) }}" class="btn btn-rounded btn-outline-secondary"><i class="fa-solid fa-edit"></i></a>
                                    <form id="delete-form-{{ $item->id }}" action="{{ route('usermanage.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"
                                            data-url="{{ route('usermanage.destroy', $item->id) }}" data-name="{{ $item->name }}"
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

@endsection
