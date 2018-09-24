<div class="datatable">
    @foreach ($offers as $offer)
        <div class="datatable-row">
            <a href="/offers/{{ $offer->id }}">
                <div class="avatar-line-64">
                    <img src="{{ asset('/img/company.jpg') }}" />
                    <div>
                        <div class="row">
                            <div class="col-sm-8">
                                <h4 class="title">{{ $offer->title }}</h4>
                                <div class="category">{{ $offer->company->name }}</div>
                                <div class="category">{{ $offer->company->industry }}</div>
                            </div>
                            <div class="col-sm-4 datatable-offers-extra" style="text-align: right; ">
                                <p><span class="category">Posted </span>{{ diffForHumansOnlyDays($offer->started_at) }}</p>
                                <p>{{ count($offer->applicances) }} applicances</p>
                                <div class="clear"></div>
                            </div>
                        </div>

                        <br>
                        <p>{!! substr($offer->body, 0, 300) !!}...</p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
