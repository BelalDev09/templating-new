<section>
    <h2>Recent property experiences</h2>

    @foreach($testimonials as $item)
        <div class="review">
            <p>{{ $item->description }}</p>
            <strong>{{ $item->title }}</strong>
        </div>
    @endforeach
</section>
