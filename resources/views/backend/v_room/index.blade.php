@extends('backend.v_layouts.app')
@section('content')
    <!-- contentAwal -->

    <div class="row">

        <div class="col-12">
            <a href="{{ route('backend.room.create') }}">
                <button type="button" class="btn btn-primary"><i class="fas fa-plus"></i>
                    Add Room</button>
            </a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> {{ $judul }} </h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Room Name</th>
                                    <th>Price</th>
                                    <th>Number of Rooms</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($index as $row)
                                    <tr>
                                        <td> {{ $loop->iteration }}</td>
                                        <td> {{ $row->category->category_name }} </td>
                                        <td>
                                            @if ($row->status == 1)
                                                <span class="badge badge-success"></i>
                                                    Ready</span>
                                            @elseif($row->status == 0)
                                                <span class="badge badge-secondary"></i>
                                                    Booked</span>
                                            @endif
                                        </td>

                                        {{-- <td> {{ $row->guest->nama }} </td> --}}
                                        <td> {{ $row->room_name }} </td>
                                        <td> Rp. {{ number_format($row->price, 0, ',', '.') }}
                                        </td>
                                        <td> {{ $row->number_of_rooms }}</td>
                                        <td>
                                            <a href="{{ route('backend.room.edit', $row->id) }}" title="Ubah Data">
                                                <button type="button" class="btn btn-cyan btn-sm"><i
                                                        class="far fa-edit"></i> Edit</button>
                                            </a>

                                            <a href="{{ route('backend.room.show', $row->id) }}" title="Ubah Data">
                                                <button type="button" class="btn btn-warning btn-sm"><i
                                                        class="fas fa-plus"></i> Image</button>
                                            </a>

                                            <form method="POST" action="{{ route('backend.room.destroy', $row->id) }}"
                                                style="display: inline-block;">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm show_confirm"
                                                    data-konf-delete="{{ $row->name }}" title='Hapus Data'>
                                                    <i class="fas fa-trash"></i> Delete</button>
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
    </div>

    <!-- contentAkhir -->
@endsection
