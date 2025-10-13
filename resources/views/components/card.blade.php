@props(['highlight' => false])

<div @class(['highlight' => $highlight, 'card'])>
    {{ $slot }}
    <a href="{{ $attributes->get('href') }}" class="btn"><p>View Details</p></a>
</div>