    @foreach(array_chunk($applicances->getCollection()->all(), 2) as $row)
        <div class="row">
            @foreach ($row as $applicance)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-content">
                            <a href="">
                                <div class="avatar-line-64">
                                    <img src="{{ asset('/img/faces/face-2.jpg') }}" />
                                    <div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <h4 class="title">{{ $applicance->offer->title }}</h4>
                                                <div class="category">{{ $applicance->offer->company->name }}</div>
                                                <div class="category">{{ $applicance->offer->company->industry }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach