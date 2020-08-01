<div class="checkbox">
    @foreach($allergies as $allergy)
        <div class="checkbox__wrapper">
            <input type="checkbox" class="checkbox__input" value="{{ $allergy['allergy'] }}" id="{{ $allergy['name'] }}" hidden>

            <label for="{{ $allergy['name'] }}" class="checkbox__checkbox-element">
                <span class="checkbox__box"></span>
                {{ $allergy['allergy'] }}
            </label>
        </div>
    @endforeach
</div>

