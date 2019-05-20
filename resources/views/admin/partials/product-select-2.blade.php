<select class="form-control m-b" name="product_id">
	@foreach ($products as $p): ?>
	<option value="{{$p->id}}" {{($ext->product != null) ? ($ext->product->id == $p->id ? 'selected' : '') : ''}}>{{$p->name}}</option>
	@endforeach
</select>      