@props(['name', 'id', 'value'])

<div class="checkbox bounce filterable">

    <input type="checkbox" id="{{ $id }}" value="{{ $value }}"/>
    

    <svg viewBox="0 0 21 21">
        <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
    </svg>
</div>
