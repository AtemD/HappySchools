<div class="alert alert-{{ $type }} alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

    @if ($type === 'info')
    <h4>{{ 'Something unusual happened, keep an eye on the following informations.' }}</h4>
    @else
    <h4>{{ 'Operation ' . ($type === 'success' ? 'Suceed!' : 'Failed Because:') }}</h4>
    @endif
    
    {{-- @if ($type === 'errors')
    <h4>Operation Failed because:</h4>
    @elseif ($type === 'errors')
    <h4>Operation Failed because:</h4>
    @endif --}}

    <ul>
        @foreach ($messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
</div>