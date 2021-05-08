@extends('layouts.main')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Agenda</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Beranda</a></div>
            <div class="breadcrumb-item">Agenda</div>
        </div>
    </div>


    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Agenda</h4>
                @if(Auth::user()->role_id == 1)
                <div class="card-header-action">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#kelolaMatapelajaran"><i class="fa fa-plus"></i> Tambah Agenda</button>
                </div>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table-1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Slug</th>
                                <th>Konten</th>
                                <th>Lokasi</th>
                                <th>Tanggal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($event as $key => $subject)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $subject->title }}</td>
                                <td>{{ $subject->slug }}</td>
                                <td>{{ $subject->content }}</td>
                                <td>{{ $subject->location }}</td>
                                <td>{{ $subject->date }}</td>
                                @if(Auth::user()->role_id == 1)
                                <td class="text-center">
                                    <div class="d-flex d-inline justify-content-center">
                                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#editSubject" 
                                    data-id="{{ $subject->id }}" 
                                    data-title="{{ $subject->title }}"
                                    data-slug="{{ $subject->slug }}" 
                                    data-content="{{ $subject->content }}"
                                    data-location="{{ $subject->location }}"
                                    data-date="{{ $subject->date }}"
                                    ><i class="fas fa-pencil-alt"></i></button>
                                    <form action="{{route('admin.event.delete', $subject->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm ml-1" onclick="return confirm('Apa Anda yakin ?');"><i class="fas fa-trash"></i></button>
                                    </form>
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="kelolaMatapelajaran" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.event.store') }}" method="POST" id="formKelolaProvince">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title"><span>Tambah</span> Agenda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Konten</label>
                        <input type="text" class="form-control" id="content" name="content" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Lokasi</label>
                        <input type="text" class="form-control" id="location" name="location" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Tanggal</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editSubject" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.event.update') }}" method="POST" id="formKelolaProvince">
                @csrf
                @method('PUT')
                <input type="hidden" name="id">
                <div class="modal-header">
                    <h5 class="modal-title"><span>Edit</span> Agenda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">            
                    <div class="form-group">    
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Konten</label>
                        <input type="text" class="form-control" id="content" name="content" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Lokasi</label>
                        <input type="text" class="form-control" id="location" name="location" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Tanggal</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@push('script')
<script>
    $('#editSubject').on('show.bs.modal', (e) => {
        var id = $(e.relatedTarget).data('id');
        var title = $(e.relatedTarget).data('title');
        var slug = $(e.relatedTarget).data('slug');
        var content = $(e.relatedTarget).data('content');
        var location = $(e.relatedTarget).data('location');
        var date = $(e.relatedTarget).data('date');

        $('#editSubject').find('input[name="id"]').val(id);
        $('#editSubject').find('input[name="title"]').val(title);
        $('#editSubject').find('input[name="slug"]').val(slug);
        $('#editSubject').find('input[name="content"]').val(content);
        $('#editSubject').find('input[name="location"]').val(location);
        $('#editSubject').find('input[name="date"]').val(date);
    });
</script>
@endpush