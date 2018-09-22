    @foreach(array_chunk($applicances->getCollection()->all(), 2) as $row)
        <div class="row">
            @foreach ($row as $applicance)
                <div class="col-lg-6">
                    <div class="card">
                        <a href="/offers/{{ $applicance->offer->id }}">
                            <div class="card-content">
                                <div class="avatar-line-64">
                                    <img src="{{ asset('/img/faces/face-2.jpg') }}" />
                                    <div>
                                        <div class="row">
                                            <div class="col-xs-8">
                                                <h4 class="title">{{ $applicance->offer->title }}</h4>
                                                <div class="category">{{ $applicance->offer->company->name }}</div>
                                                <div class="category">{{ $applicance->offer->company->industry }}</div>
                                            </div>
                                            <div class="col-xs-4 text-right">
                                                <p>
                                                    @if($applicance->accepted_at)
                                                    <span class="alert-success">Accepted</span>
                                                        <br><small>({{ $applicance->accepted_at->diffForHumans() }})</small>
                                                    @elseif($applicance->declined_at)
                                                        <span class="alert-danger">Declined</span>
                                                        <br><small>({{ $applicance->declined_at->diffForHumans() }})</small>
                                                    @elseif($applicance->viewed_at)
                                                        <span class="alert-info">Viewed</span>
                                                        <br><small>({{ $applicance->viewed_at->diffForHumans() }})</small>
                                                    @else
                                                        <span class="alert-info">Posted</span>
                                                        <br><small>({{ $applicance->created_at->diffForHumans() }})</small>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach