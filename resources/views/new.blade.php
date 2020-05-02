@foreach($name as $n)
{{ $n }}<br />
@endforeach

@for( $i = 0; $i < $count; $i++ )
{{ $subtitle[$i] }} : {{ $contents[$i] }}<br />
@endfor
