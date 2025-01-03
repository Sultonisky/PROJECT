@extends('backend.v_layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('backend.reservation.create') }}">
                <button type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Add Data Reservation</button>
            </a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> {{ $judul }} </h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Guest Name</th>
                                    <th>Room Name</th>
                                    <th>Room Price</th>
                                    <th>Check-in Date</th>
                                    <th>Check-out Date</th>
                                    <th>Total Payment</th>
                                    <th>Payment Method</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($index as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->guest->name }}</td>
                                        <td>{{ $row->room->room_name }}</td>
                                        <td> Rp. {{ number_format($row->room->price, 0, ',', '.') }}
                                        <td>{{ $row->tanggal_checkin }}</td>
                                        <td>{{ $row->tanggal_checkout }}</td>
                                        <td>Rp. {{ number_format($row->total_payment, 0, ',', '.') }}</td>
                                        <td>
                                            @if ($row->payment == 1)
                                                <span class="badge badge-success">Cash</span>
                                            @else
                                                <span class="badge badge-secondary">Credit</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('backend.reservation.show', $row->id) }}"
                                                title="Lihat Detail">
                                                <button type="button" class="btn btn-info btn-sm"><i
                                                        class="fas fa-eye"></i> Details</button>
                                            </a>
                                            <a href="{{ route('backend.reservation.edit', $row->id) }}" title="Edit Data">
                                                <button type="button" class="btn btn-warning btn-sm"><i
                                                        class="far fa-edit"></i> Edit</button>
                                            </a>
                                            <form method="POST"
                                                action="{{ route('backend.reservation.destroy', $row->id) }}"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm show_confirm"
                                                    title="Hapus Data">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
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
@endsection
