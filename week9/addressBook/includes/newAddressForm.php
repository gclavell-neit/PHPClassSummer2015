<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <form method="post" action="#">            
            Full Name: <input type="text"  name="fullname" <?php if(isset($results) && !is_null($results['fullname'])): ?> value = "<?php echo $results['fullname'];?>"<?php endif;?>/>
            <br />
            Group: <select name="address_group_id">
            <?php foreach ($groups as $row): ?>
                <option value="<?php echo $row['address_group_id']; ?>"><?php echo $row['address_group']; ?></option>
            <?php endforeach; ?>
            </select>
            <br />
            Email: <input type="text"  name="email" <?php if(isset($results) && !is_null($results['email'])): ?> value = "<?php echo $results['email'];?>" <?php endif;?>/>
            <br />
            Address: <input type="text"  name="address" <?php if(isset($results) && !is_null($results['address'])): ?> value = "<?php echo $results['address'];?>" <?php endif;?>/>
            <br />  
            Phone: <input type="text"  name="phone" <?php if(isset($results) && !is_null($results['phone'])): ?> value = "<?php echo $results['phone'];?>"<?php endif;?>/>
            <br />
            Website: <input type="text"  name="website" <?php if(isset($results) && !is_null($results['website'])): ?> value = "<?php echo $results['website'];?>"<?php endif;?>/>
            <br /> 
            Birthday: <input type="text"  name="birthday" <?php if(isset($results) && !is_null($results['birthday'])): ?> value = "<?php echo $results['birthday'];?>"<?php endif;?>/>
            <br />  
            <input type="hidden" value="" name="id" /> 
            <input type="submit" value="Submit" />
        </form>
        
</html>
