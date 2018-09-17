<div>
    <h2>
        <a href="/companies/{{ $company->id }}">
            {{ $company->name }}
        </a>
    </h2>
    <p>
        {{ $company->industry }} 
        <br>Boss: {{ $company->user->name }} 

        @if(count($company->offers) > 0)
            <br>{{ count($company->offers) }} open positions
        @else
            <br>No open positions at the moment
        @endif
    </p>
</div>