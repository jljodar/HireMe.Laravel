<div>
    <a href="/offers/{{ $offer->id }}">
        <h4>{{ $offer->title }}</h4>
        <p>
            @if(! $mini)
                {{ $offer->company->name }}
                <br>{{ $offer->user->name }}
                <br>
            @endif
            
            {{ substr($offer->body, 0, 100) }}
        </p>
    </a>
</div>