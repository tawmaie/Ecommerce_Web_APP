<div class="col-{{$card['colspan']}} mt-3">
    @if($card['component'] === 'container')
        @foreach($card['children'] as $child)
        <div class="row">
            <x-shop.card :card="$child" />
        </div>
        @endforeach
    @else
        @yield($card['component'])
    @endif
</div>
