{{-- Success-Error Messages --}}
@if (session('success'))
    <input type="hidden" id="success" value="{{ session('success') }}">
@endif
@if (session('error'))
    <input type="hidden" id="error" value="{{ session('error') }}">
@endif
{{-- /Success-Error Messages --}}
