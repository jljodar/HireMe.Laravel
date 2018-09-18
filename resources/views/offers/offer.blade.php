<div class="col-lg-6">
    <a href="/offers/{{ $offer->id }}">
        <div class="card">
            <div class="content">
                    @if(isset($mini) && $mini)
                        <h4 class="title">{{ $offer->title }}</h4>
                    @else
                        <div class="row">
                            <div class="col-xs-10">
                                <h4 class="title">{{ $offer->title }}</h4>
                                <p class="category">{{ $offer->company->name }}</p>
                            </div>
                            <div class="col-xs-2">
                                <div class="icon-32 text-center">
                                    <i class="ti-server"></i>
                                </div>
                            </div>
                        </div>
                    @endif
                <div class="footer">
                    <hr>
                    <div class="stats">{{ substr($offer->body, 0, 100) }}</div>
                </div>
            </div>
        </div>
    </a>
</div>