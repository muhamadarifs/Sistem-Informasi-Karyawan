@props(['action', 'data'])

@auth
    @if (auth()->user()->role == 'superadmin' || auth()->user()->role == 'admin')
    <div class="modal-dialog">
        <form id="form-action" action="{{ $action }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Event Calendar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ $slot }}
                </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save </button>
                </div>
            </div>
        </form>
    </div>
    @else
    <div class="modal-dialog">
        <form id="form-action" action="{{ $action }}" method="get">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Event Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ $slot }}
                </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mx-auto" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
    @endif
@endauth
