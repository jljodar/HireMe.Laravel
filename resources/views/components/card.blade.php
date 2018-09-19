<div class="card">
    <div class="content">
        <div class="row">
            <div class="col-xs-5">
                <div class="icon-big icon-warning text-center">
                    <i class="{{ $icon }}"></i>
                </div>
            </div>
            <div class="col-xs-7">
                <div class="numbers">
                    <p>{{ $title }}</p>
                    {{ $data }}
                </div>
            </div>
        </div>

        @if(isset($info))
        <div class="footer">
            <hr>
            <div class="stats">
                <?= $info ?>
            </div>
        </div>
    @endif
    </div>
</div>