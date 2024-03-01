@foreach ($catList as $cat)
    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
@endforeach
