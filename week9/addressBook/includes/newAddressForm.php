<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <form method="post" action="#">            
            Full Name <input type="text" value="" name="fullname" />
            <br />
            Group<select name="address_group_id">
            <?php foreach ($groups as $row): ?>
                <option value="<?php echo $row['address_group_id']; ?>"><?php echo $row['address_group']; ?></option>
            <?php endforeach; ?>
            </select>
            <br />
            Email <input type="text" value="" name="email" />
            <br />
            Address <input type="text" value="" name="address" />
            <br />  
            Phone <input type="text" value="" name="phone" />
            <br />
            Website <input type="text" value="" name="website" />
            <br /> 
            Birthday <input type="text" value="" name="birthday" />
            <br />  
            <input type="hidden" value="" name="id" /> 
            <input type="submit" value="Add" />
        </form>
        
</html>
