@if(session()->has('success') || session()->has('warning') || session()->has('danger'))

    <div class="mb-3">

        @if(session()->has('success'))
            <div class="alert alert-success mb-1">
                {{ session()->get('success') }}
            </div>
        @endif

        @if(session()->has('warning'))
            <div class="alert alert-warning mb-1">
                {{ session()->get('warning') }}
            </div>
        @endif

        @if(session()->has('info'))
            <div class="alert alert-info mb-1">
                {{ session()->get('info') }}
            </div>
        @endif

        @if(session()->has('danger'))
            <div class="alert alert-danger mb-1">
                {{ session()->get('danger') }}
            </div>
        @endif

    </div>

@endif