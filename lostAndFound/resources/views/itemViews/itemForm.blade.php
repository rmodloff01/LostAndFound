@extends('layouts.app')
@section('content')
<div id="addItemForm">
	<form action="$_SERVER['PHP_SELF']" method='post' id='addItem'>
		<div class="container">
			<div class="row">
				<div class="col-md-4" style="margin-left:14.75em">
					<br><label>Item Type:&nbsp</label><br>
					<div class="form-group">
						<select size="11" name="types[]" id="type" style="width:300px">
							<option value="Keys">Keys</option>
							<option value="Wallet">Wallet</option>
							<option value="CellPhone">Cell Phone</option>
							<option value="Laptop">Laptop/Tablet</option>
							<option value="ID">AU ID - Official Gov ID Card</option>
							<option value="FlashDrive">Flash Drive</option>
							<option value="Textbook">Textbook</option>
							<option value="Clothing">Clothing</option>
							<option value="Bags">Bags - Purses/Backpack</option>
							<option value="Debit">Debit/Credit Card</option>
							<option value="Glasses">Glasses</option>
							<option value="Jewelery">Jewelry</option>
							<option value="Charger">Charger</option>
							<option value="Headphones">Headphones</option>
							<option value="Notebook">Notebook/Binder</option>
							<option value="Other">Other</option>
						</select>
					</div>
					<label>Location Found:&nbsp</label>
					<br><input type="text" name="location" placeholder="Location Found" value="" style="width:300px"><br>
					<br><label>Description:&nbsp</label><br>
					<textarea name ='description' placeholder="Description" form="addItem" style="width:300px" rows="3"></textarea>
					<br>
				</div>
				<div class="col-md-4">
					<br><label>Date Found:&nbsp</label>
					<br><input type="text" name='datefound' placeholder="Date Found" value="" style="width:300px"><br>
					<br><label>Report Number:&nbsp</label>
					<br><input type="text" name='reportnumber' placeholder="Report Number" value="" style="width:300px"><br>
					<br><label>Owner Info:&nbsp</label>
					<br><textarea name ='ownerinfo' placeholder="Any information about the owner?" form="addItem" style="width:300px" rows="3"></textarea><br><br>
					<label>Inventory Location:&nbsp</label>
					<br><input type="text" name='inventorylocation' placeholder="Inventory Location" value="" style="width:300px"><br><br>
					<label>Officer:&nbsp</label>
					<br><input type="textarea" name='officer' placeholder="Officer" value="" style="width:300px"><br><br>
					<input  type="hidden" name='state' value='create'>
				</div>
			</div>
		</div>
		<div style="text-align:center">
			<button type="submit" class="btn btn-primary">Add Item</button>
		</div>
		<br>
	</form>
</div>
    @endsection
