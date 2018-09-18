<div class="col-lg-6">
    <a href="/applicance/{{ $applicance->id }}">
        <div class="card">
            <div class="content">
                <div class="row">
                    <div class="col-xs-10">
                        <h4 class="title">{{ $applicance->offer->title }}</h4>
                        <p class="category">{{ $applicance->offer->company->name }}</p>
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
                        blablabla
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>