@extends('layouts.main')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Video</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Beranda</a></div>
            <div class="breadcrumb-item">Video</div>
        </div>
    </div>


    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Detail Video</h4>
                <div class="card-header-action">
                    <a href="{{route('admin.video.index')}}" class="btn btn-primary" > Kembali</a>
                </div>
            </div>
            <div class="card-body">
            @php
            $yt_code = explode('https://www.youtube.com/watch?v=', $video->link)[1] ?? explode('https://youtu.be/', $video->link)[1] ?? null;
            @endphp
            
            <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="100%" height="443" type="text/html" src="{{ 'https://www.youtube.com/embed/' . $yt_code }}">
                </iframe>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="kelolaMatapelajaran" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.video.store') }}" method="POST" enctype="multipart/form-data" id="formKelolaProvince">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title"><span>Tambah</span> Video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="link">Link Video</label>
                        <input type="text" class="form-control" id="link" name="link" required>
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
            <form action="{{ route('admin.video.update') }}" enctype="multipart/form-data" method="POST" id="formKelolaProvince">
                @csrf
                @method('PUT')
                <input type="hidden" name="id">
                <div class="modal-header">
                    <h5 class="modal-title"><span>Edit</span> Video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="link">Link Video</label>
                        <input type="text" class="form-control" id="link" name="link" required>
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
        var caption = $(e.relatedTarget).data('caption');

        $('#editSubject').find('input[name="id"]').val(id);
        $('#editSubject').find('input[name="caption"]').val(caption);
    });
</script>
@endpush