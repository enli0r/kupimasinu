@props(['name', 'value', 'id'])

<input type="radio" name="{{ $name }}" id="{{ $id }}" value="{{ $value }}" @if (old($name) === $value) checked @endif/>
