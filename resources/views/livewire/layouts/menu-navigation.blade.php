<div>
@foreach ($menu->menuItems as $item)
    <a href="{{ $item->url }}">{{ $item->title }}</a>
 
    @if ($item->children)
        @foreach ($item->children as $child)
            <a href="{{ $child->url }}">{{ $child->title }}</a>
        @endforeach
    @endif
@endforeach
</div>

