@props(['swatch' => '', 'title' => '', 'description' => ''])

@php
  $activeSwatch = '';
  if (isset($swatch)) {
    if (in_array($swatch,['ocean','kale','disco','retro','fresco'])) {
      $activeSwatch = $swatch;
    }
  }
@endphp

<div class="header-holder">
  <div class="background-img">
    <div class="overlay-gradient {{ $activeSwatch }}">
      <div class="header-content">
        <h1 class="header-title">{{ $title }}</h1>
        <p class="header-description">{{ $description }}</p>
      </div>
    </div>
  </div>
</div>