<div class="input-group">
    <label for="spice">Spice rating</label>
    <select name="spice" id="spice">
        <option value="select" disabled selected>Please select a spice level</option>

        @foreach($ratings as $rating)
            <option value="{{ $rating['rating'] }}">{{ $rating['spice'] }}</option>
        @endforeach
    </select>
</div>
