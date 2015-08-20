
<form method="post" action="#">
 
            <select name="site_id">
            <?php foreach ($site as $row): ?>
                <option value="<?php echo $row['site_id']; ?>"><?php echo $row['site']; ?></option>
            <?php endforeach; ?>
            </select>

            <input type="submit" value="Submit" />
                </form>
