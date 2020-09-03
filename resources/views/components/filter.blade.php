<form method="POST" action="{{ route('filter') }}">
    <div class="form-wrapper grid gap-30">
        <div class="grid g-col-2 gap-20 align-flex-end">
            <div class="input-group">
                <label for="filter">Category</label>
                <select name="filter" id="filter">
                    @foreach ($list as $filter)
                        <option {{ $filter['value'] == $chosenFilter ? 'selected' : '' }}
                            value="{{ $filter['value'] }}">{{ $filter['label'] }}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="Filter" class="button button--primary justify-self-start">
        </div>
    </div>
    {{ $slot }}
    @csrf
</form>
