<?php ?>
<form action="#" method="GET">
	Filter By: 
	<select name="address_group_id">
	<?php foreach ($groups as $row): ?>
    <option value="<?php echo $row['address_group_id']; ?>"><?php echo $row['address_group']; ?></option>
    <?php endforeach; ?>
    <option value="">No filter</option>
    </select>
    
    <input type="submit" value="Submit" />
</form>