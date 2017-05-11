@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<form action="editForm" method='post' id='editItem'>
			{{csrf_field()}}
			<fieldset>
				<div class="col-md-6">
					<div class="form-group">
						<label for='collected'>Collected By:&nbsp</label>
						<input type="text" name='collected' id='collected' value= "{{$item->collected_by}}" class="form-control" maxlength="50">
					</div>
					<div class="form-group">
						<label for="selectbox" class = "control-label">Item Type:</label>
                        <select name="type" id="selectbox" class="form-control">
                            @foreach($formTypes as $element)
                                <option value="{{$element->type_id}}" @if($element->type_id==$item->type_id) selected @endif>{{$element->type}}</option>
                            @endforeach
                        </select>
					</div>
					<input type='hidden' name='id' value= {{$item->item_id}}>
					<div class="form-group">
						<label for='description'>Description:&nbsp</label>
						<textarea name ='description' id='description' form="editItem" rows="3" class="form-control" maxlength="500">{{$item->description}}</textarea>
					</div>
					<div class="form-group">
						<label for='location'>Location Found:&nbsp</label>
						<input type="text" name="location" id='location' value= "{{$item->location_found}}" class="form-control" maxlength="100">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for='reportnumber'>Report Number:&nbsp</label>
						<input type="text" name='reportnumber' id='reportnumber' value= "{{$item->report_number}}" class="form-control" maxlength="45">
					</div>
					<div class="form-group">
						<label for='ownerinfo'>Owner Info:&nbsp</label>
						<textarea name ='ownerinfo' id='ownerinfo' form="editItem" rows="3" class="form-control" maxlength="500"> {{$item->owner_info}} </textarea>
					</div>
					<div class="form-group">
						<label for='inventorylocation'>Inventory Location:&nbsp</label>
						<input type="text" name='inventorylocation' id='inventorylocation' value= "{{$item->inventory_location}}" class="form-control" maxlength="45">
					</div>
					<div class="form-group">
						<label for='officer'>Officer:&nbsp</label>
						<input type="textarea" name='officer' id='officer' value= "{{$item->officer}}" class="form-control" maxlength="45">
					</div>
				</div>
				<div style="text-align:center">
					<button type="submit" class="btn btn-primary">Save Changes</button>
				</div>
			</fieldset>
		</form>
	</div>
</div>
    @endsection
