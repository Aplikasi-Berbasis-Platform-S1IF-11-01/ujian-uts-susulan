<section id="hero">
    <h1>{{ $hero->greeting ?? '' }}</h1>
    <h2>{{ $hero->name ?? '' }}</h2>
    <h3>{{ $hero->title ?? '' }}</h3>
    <p>{{ $hero->description ?? '' }}</p>

    <a href="#projects">View Portfolio</a>
    <a href="#contact">Contact Me</a>
</section>