<div class="datatable">
    @foreach ($companies as $company)
        <div class="datatable-row">
            <a href="/companies/{{ $company->id }}">
                <div class="avatar-line-64">
                    <img src="{{ asset('/img/company.jpg') }}" />
                    <div>
                        <div class="row">
                            <div class="col-sm-8">
                                <h4 class="title">{{ $company->name }}</h4>
                                <div class="category">{{ $company->industry }}</div>

                                <div class="category">
                                    @if(($activeOffersCount = count($company->activeOffers())) > 0)
                                        {{ $activeOffersCount }} open positions
                                    @else
                                        No open positions at the moment
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
