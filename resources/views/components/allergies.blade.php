<div id="allergies">
    @foreach($allergies as $allergy)
    <div class="allergy">
        <label for="{{ $allergy->identifier }}">{{ $allergy->allergy }}</label>
        <input type="checkbox" value="{{ $allergy->allergy }}" id="{{ $allergy->identifier }}">
    </div>
    @endforeach
</div>
