<a href="/companies/{{ $company->id }}">
    <div class="card">
        <div class="content">
            <div class="row">
                <div class="col-xs-10">
                    <h4 class="title">{{ $company->name }}</h4>
                    <p class="category">{{ $company->industry }}</p>
                </div>
                <div class="col-xs-2">
                    <div class="icon-mid text-center">
                        <i class="ti-server"></i>
                    </div>
                </div>
            </div>
            <div class="footer">
                <hr>
                <div class="stats">
                    @if(count($company->offers) > 0)
                        {{ count($company->offers) }} open positions
                    @else
                        No open positions at the moment
                    @endif
                </div>
            </div>
        </div>
    </div>
</a>