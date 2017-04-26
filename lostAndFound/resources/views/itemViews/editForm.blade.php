@extends('layouts.app')
@section('content')
<div id="editItemForm">
	<div class="container">
		<div class="row">
			<form action="" method='post' id='editItem'>
				{{csrf_field()}}
				<fieldset>
					<div class="col-md-6">
						<div class="form-group">
							<label for='collected'>Collected By:&nbsp</label>
							<input type="text" name='collected' id='collected' value= "{{$item->collected_by}}" class="form-control" maxlength="50">
						</div>
						<div class="form-group">
						<label for='type'>Item Type:&nbsp</label>
							<?php
							echo Form::select('type', array('1' => 'Keys', '2' => 'Wallet',
										'3' => 'Cell Phones', '4' => 'Laptop/Tablets', '5' => 'AU ID - Official Gov ID Card',
										'6' => 'Flash Drive',  '7' => 'Textbook', '8' => 'Clothing',  '9' => 'Bags - Purses/Backpack',
										'10' => 'Debit/Credit Card',  '11' => 'Glasses', '12' => 'Jewelry',  '13' => 'Charger', '14' => 'Headphones',
									  '15' => 'Notebook/Binder', '16' => 'Other'), $item->type_id, ['class' => 'form-control', 'id' => 'type']); ?>
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
</div>
    @endsection
