<form action="#" method="GET">
    <fieldset>
        
        <label>Choose a column to sort by: </label>  
       
        <label class="radio-inline"><input type="radio" name="orderby" value="fullname">Name</label>
        <label class="radio-inline"><input type="radio" name="orderby" value="address">Address</label>
        <label class="radio-inline"><input type="radio" name="orderby" value="email">Email</label>
        <label class="radio-inline"><input type="radio" name="orderby" value="phone">Phone</label>
        <input type="hidden" name="action" value="sort" />
        <input type="hidden" name="address_group_id" value="<?php echo $filter; ?>" />
        <input type="submit" value="Submit" />
    </fieldset><br>    
</form>
