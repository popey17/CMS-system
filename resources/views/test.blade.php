<h1>This is test page.</h1>


@foreach ( $sales as $sale)
    {{-- {{$sale->pro}} --}}
    @foreach ($sale->products as $item)
        <div>{{$item->name}}{{$item->pivot->quantity}}</div>
    @endforeach
@endforeach