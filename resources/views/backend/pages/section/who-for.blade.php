<section>
    <h2>Who Betacompass is for</h2>

    <div class="row">
        @foreach($whoFor as $item)
            <div class="col-md-3">
                <h6>{{ $item->title }}</h6>
                <p>{{ $item->description }}</p>
            </div>
        @endforeach
    </div>
</section>
