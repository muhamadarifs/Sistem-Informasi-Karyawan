<x-modal-action action="{{ $action }}">
    @if ($data->id)
        @method('put')
    @endif

    @auth
        @if (auth()->user()->role == 'superadmin' || auth()->user()->role == 'admin')
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <span>Mulai Tanggal</span>
                    <input type="date" name="start_date" readonly value="{{ $data->start_date ?? request()->start_date }}" class="form-control text-center">
                </div>
            </div>
            
            <div class="col-6">
                <div class="mb-3">
                    <span>Sampai Tanggal</span>
                    <input type="date" name="end_date" value="{{ $data->end_date ?? request()->end_date }}" class="form-control text-center">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <span>Keterangan</span>
                    <textarea name="title" class="form-control">{{ $data->title }}</textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" {{ $data->category == 'Event Kantor' ? 'checked' : null}} type="radio" name="category" id="category-info" value="Event Kantor">
                        <label class="form-check-label" for="category-info">Event Kantor</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" {{ $data->category == 'Hari Libur' ? 'checked' : null}} type="radio" name="category" id="category-danger" value="Hari Libur">
                        <label class="form-check-label" for="category-danger">Hari Libur</label>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="delete" role="switch" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Delete</label>
                      </div>
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <span>{{ $data->title }}</span>
                </div>
            </div>
        </div>
        @endif
    @endauth
    
</x-modal-action>