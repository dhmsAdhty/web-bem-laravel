@extends('layouts.nav')
<script src="//unpkg.com/alpinejs" defer></script>

@section('content')
<!-- Hero Section -->
<x-hero.hero />
<!-- Profil Section -->
<x-profil.profil />
<!-- About Section -->
<x-about.about />
<!-- Event Section -->
<x-event.event :events="$events" />
<!-- Blog Section -->
<x-blog.blog :blogs="$blogs" />
<!-- Contact Section -->
<x-contact.index />
@endsection