@props(['url'])

@if(is_string($url) && !empty($url))
    <p>Audio URL: {{ $url }}</p>
    <audio controls>
        <source src="{{ $url }}" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
@else
    <span>Нажмите на ссылку</span>
@endif
