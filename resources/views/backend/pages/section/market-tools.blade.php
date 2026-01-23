<section>
    <h2>Understand the Market</h2>

    <div class="row">
        @foreach($marketTools as $tool)
            <div class="col-md-3">
                <div class="card">
                    <h5>{{ $tool->title }}</h5>
                    <p>{{ $tool->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>
