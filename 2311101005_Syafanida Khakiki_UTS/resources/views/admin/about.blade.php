<section id="about">
    <h2>About Me</h2>

    <p>{{ $about->description ?? '' }}</p>

    <h3>Education</h3>
    <p>{{ $about->education ?? '' }}</p>

    <h3>Software</h3>
    <p>{{ $about->software ?? '' }}</p>
</section>