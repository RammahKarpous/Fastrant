<div id="checkbox">
    @foreach($allergies as $allergy)
        <div class="checkbox__wrapper">
            <label for="{{ $allergy['name'] }}" class="checkbox__element">{{ $allergy['allergy'] }}</label>
            <input type="checkbox" value="{{ $allergy['allergy'] }}" id="{{ $allergy['name'] }}" hidden>
        </div>
    @endforeach
</div>

