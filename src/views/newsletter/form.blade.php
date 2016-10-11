<form action="{{ route('subscribe') }}" method="post" class="form-inline">
    {{ csrf_field() }}
    <fieldset>
        <legend>Subscribe to our Newsletter</legend>
        <div class="form-group">
            {{-- TODO: make it requried --}}
            <input class="form-control input-lg" placeholder="your@email.com" type="email" id="email" name="email">
        </div>
        <input type="submit" name="submit" value="Subscribe" class="btn btn-success btn-lg">
    </fieldset>
</form>