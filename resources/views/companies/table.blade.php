<div class="datatable">
    @foreach ($companies as $company)
        <div class="datatable-row">
            <a href="/companies/{{ $company->id }}">
                <div class="avatar-line-64">
                    <img src="{{ asset('/img/faces/face-2.jpg') }}" />
                    <div>
                        <div class="row">
                            <div class="col-sm-8">
                                <h4 class="title">{{ $company->name }}</h4>
                                <div class="category">{{ $company->industry }}</div>

                                <div class="category">
                                    @if(count($company->offers->where('isActive', true)) > 0)
                                        {{ count($company->offers->where('isActive', true)) }} open positions
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