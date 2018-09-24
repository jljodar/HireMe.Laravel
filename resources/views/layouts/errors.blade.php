@php
    if(! isset($errorBag)) {
        $errorBag = $errors;
    }
@endphp

@if ($errorBag->any())
    <div class="form-group validation-error-list">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errorBag->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@php
    unset($errorBag);
@endphp
